<?php


namespace Controllers;

use \Models\Database as Conexao;
use \PDO;
use \Utils\Email as Email;
use \Utils\RenderView;


class PessoaJuridica extends RenderView
{

    private $pessoaJuridica;
    private $solicitacaoServico;
    private $usuarioId;
    private $solicitacao;
    private $servico;

    public function __construct()
    {
        $this->pessoaJuridica = new Conexao('pessoaJuridica');
        $this->solicitacaoServico = new Conexao('solicitacaoServico');
        $this->usuarioId = $_SESSION['usuarios_logado']->usuarios_id;
        $this->solicitacao = new Conexao('solicitacao');
        $this->servico = new Conexao('servicos');
    }

    protected function redirect($path, $mensagem = null)
    {
        if ($mensagem) {
            $_SESSION['msg'] = $mensagem;
        }
        header("Location: {$path}");
        exit();
    }


    // Tela de profissional
    // Mostras a tela inciail
    public function index()
    {
        $data = [];
        $data['pagina'] = 'Pessoa juridica';

        $ativos = $this->quantidadeAtivos();
        $pendentes = $this->quantidadePendentes();

        $data['total_ativos'] = $ativos->total ?? 0;
        $data['total_pendentes'] = $pendentes->total ?? 0;


        $solicitacaoPendente = $this->servicosPendentes();
        $data['solicitacaoPendente'] = $this->solicitacaoServico->selectProfissionais($solicitacaoPendente)->fetchAll(PDO::FETCH_OBJ);



        return $this->loadView('user/homeProfissional/index', $data);
    }

    // Mostrar as solicitações pendentes
    public function telaPendentes()
    {
        $data = [];
        $data['pagina'] = 'Serviços Pendentes';

        $solicitacaoPendente = $this->servicosPendentes();

        $data['solicitacaoPendente'] = $this->solicitacaoServico->selectProfissionais($solicitacaoPendente)->fetchAll(PDO::FETCH_OBJ);

        return $this->loadView('user/homeProfissional/servicosPendentes', $data);
    }

    // Mostra as solicitações ativas 
    public function telaAtivas()
    {
        $data = [];
        $data['pagina'] = 'Serviços ativos';

        $solicitacaoAtivas = $this->servicosAtivos();
        $data['solicitacaoAtivas'] = $this->solicitacaoServico->selectProfissionais($solicitacaoAtivas)->fetchAll(PDO::FETCH_OBJ);

        return $this->loadView('user/homeProfissional/servicosAtivos', $data);
    }

    // Detalha os dados das solicitações pendentes
    public function detalhesSolicitacao()
    {
        $data = [];
        $data['solicitacaoPendente'] = 'Dados Pendentes';
        $solicitacaoPendente = $this->servicosPendentes();
        $data['solicitacaoPendente'] = $this->solicitacaoServico->selectProfissionais($solicitacaoPendente)->fetch(PDO::FETCH_OBJ);

        return $this->loadView('user/homeProfissional/solicitacao', $data);
    }


    public function aceitar($solicitacaoId)
    {

        $values = [
            'solicitacao_status' => 'Ativo',
        ];

        $where = "solicitacao_id = '$solicitacaoId'";


        if ($this->solicitacao->update($where, $values)) {

            $_SESSION['msg'] = [
                'texto' => 'Solicitação de serviço aceita com sucesso!',
                'color' => 'success',
            ];

            $dadosUsuario = $this->dadosEmailSolicitacao($solicitacaoId, $this->usuarioId);
            $emailDados = $this->servico->selectProfissionais($dadosUsuario)->fetch(PDO::FETCH_OBJ);

            $status = "Aceito";

            $email = new Email();
            $email->solicitacaoServico($emailDados->email, $emailDados->nome, $emailDados->servico, $status);
        } else {

            $_SESSION['msg'] = [
                'texto' => 'Erro ao aceitar solicitação de serviço. Tente novamente!',
                'color' => 'danger',
            ];
        }

        return $this->redirect(base_url('user/homeProfissional/index'));
    }



    public function recusar($solicitacaoId)
    {

        $values = [
            'solicitacao_status' => 'Recusado',
            'solicitacao_motivo' => $_POST['solicitacao_motivo'] ?? '',
        ];

        $where = "solicitacao_id = '$solicitacaoId'";


        if ($this->solicitacao->update($where, $values)) {

            $_SESSION['msg'] = [
                'texto' => 'Solicitação de serviço recusada com sucesso!',
                'color' => 'success',
            ];

            $dadosUsuario = $this->dadosEmailSolicitacao($solicitacaoId, $this->usuarioId);
            $emailDados = $this->servico->selectProfissionais($dadosUsuario)->fetch(PDO::FETCH_OBJ);

            $status = "Recusada";

            $email = new Email();
            $email->solicitacaoServico($emailDados->email, $emailDados->nome, $emailDados->servico, $status);
        } else {

            $_SESSION['msg'] = [
                'texto' => 'Erro ao recusar solicitação de serviço. Tente novamente!',
                'color' => 'danger',
            ];
        }

        return $this->redirect(base_url('user/homeProfissional/index'));
    }



    public function finalizarAll()
    {
        $sql = "UPDATE solicitacao so
                    INNER JOIN solicitacaoServico ss on ss.solicitacaoServico_solicitacao_id = so.solicitacao_id
                    INNER JOIN servicos s on ss.solicitacaoServico_servicos_id = s.servicos_id
                    Set so.solicitacao_status = 'Finalizado',
                    so.solicitacao_conclusao = NOW()
                    WHERE s.servicos_usuarios_id = '$this->usuarioId'";

        if ($this->solicitacaoServico->selectProfissionais($sql)) {
            $_SESSION['msg'] = ['texto' => 'Solicitações excluídas com sucesso!', 'color' => 'success'];

            
        } else {
            $_SESSION['msg'] = ['texto' => 'Erro ao excluir as solicitações, tente novamente!', 'color' => 'danger'];
        }

        return $this->telaAtivas();
    }

    // Funçao para deletar uma solicitação recusada em especifico
    public function finalizarUnique($solicitacaoID)
    {
        if (!$solicitacaoID) {
            return $this->redirect(base_url('user/homeProfissional/servicosAtivos'));
        }

        $sql = "UPDATE solicitacao so
                    INNER JOIN solicitacaoServico ss on ss.solicitacaoServico_solicitacao_id = so.solicitacao_id
                    Set so.solicitacao_status = 'Finalizado',
                    so.solicitacao_conclusao = NOW()
                    WHERE so.solicitacao_id = '$solicitacaoID'";

        if ($this->solicitacaoServico->selectProfissionais($sql)) {
            $_SESSION['msg'] = ['texto' => 'Serviço finalizado com sucesso!', 'color' => 'success'];
        } else {

            $_SESSION['msg'] = ['texto' => 'Erro ao finalizar esse serviço tente novamente!', 'color' => 'danger'];
        }

        return $this->telaAtivas();
    }



    public function avaliacao(){
        $data = [];
        $data['Avaliacoes'] = 'Avaliacoes';

        return $this->loadView('user/homeProfissional/minhaAvaliacao', []);
    }




    // Mosta os dados da quantidade de ativos
    public function quantidadeAtivos()
    {
        $usuarioId = $_SESSION['usuarios_logado']->usuarios_id;

        $selectCount =
            "SELECT COUNT(*) AS total
            FROM solicitacaoServico ss

            INNER JOIN servicos s
                ON s.servicos_id = ss.solicitacaoServico_servicos_id
            INNER JOIN solicitacao so
	            on so.solicitacao_id = ss.solicitacaoServico_solicitacao_id

            WHERE so.solicitacao_status = 'Ativo'
            AND s.servicos_usuarios_id = '$usuarioId'";

        return $this->solicitacaoServico->selectProfissionais($selectCount)->fetchObject();
    }

    // Mosta os dados da quantidade de Pendentes
    public function quantidadePendentes()
    {
        $usuarioId = $_SESSION['usuarios_logado']->usuarios_id;

        $selectCount =
            " SELECT COUNT(*) AS total
            FROM solicitacaoServico ss

            INNER JOIN servicos s
                ON s.servicos_id = ss.solicitacaoServico_servicos_id
            INNER JOIN solicitacao so
	            on so.solicitacao_id = ss.solicitacaoServico_solicitacao_id

            WHERE so.solicitacao_status = 'Pendente'
            AND s.servicos_usuarios_id = '$usuarioId'";

        return $this->solicitacaoServico->selectProfissionais($selectCount)->fetchObject();
    }


    public function servicosPendentes()
    {

        return "SELECT 
           COALESCE(
                CONCAT(pf_cliente.pf_nome, ' ', pf_cliente.pf_sobrenome),
                pj_cliente.pj_nomeFantasia
            ) AS nome,
            u_cliente.usuarios_imagem as usuariosImagem,
            u_cliente.usuarios_id,
            u_cliente.usuarios_email as email,
            u_cliente.usuarios_telefone as telefone,
            e.endereco_rua as rua,
            e.endereco_complemento as complemento,
            e.endereco_bairro as bairro,
            e.endereco_numero as numero,
            e.endereco_descricao as descricao,
            e.endereco_cidade as cidade,
            e.endereco_uf as uf,
            so.solicitacao_id,
            so.solicitacao_data_atual as solicitacao_data_atual,
            so.solicitacao_data as solicitacao_data,
            so.solicitacao_quantidade as quantidade,
            servicos_nome,
            so.solicitacao_observacao as observacao


            from solicitacaoServico

            INNER JOIN solicitacao so on solicitacaoServico_solicitacao_id = so.solicitacao_id
            INNER JOIN servicos on solicitacaoServico_servicos_id = servicos_id
            INNER JOIN usuarios u_cliente ON u_cliente.usuarios_id = so.solicitacao_usuarios_id
            
            -- Instância 2: O Dono do serviço (O Profissional)
            LEFT JOIN pessoaFisica pf_cliente ON pf_cliente.pf_usuarios_id = u_cliente.usuarios_id 
            LEFT JOIN pessoaJuridica pj_cliente ON pj_cliente.pj_usuarios_id = u_cliente.usuarios_id
            left JOIN endereco e on e.endereco_usuarios_id = u_cliente.usuarios_id
            
            -- Filtra pelo ID do cliente logado e status Pendente
            WHERE servicos_usuarios_id = '$this->usuarioId' AND so.solicitacao_status = 'Pendente'
            ORDER BY so.solicitacao_id DESC";
    }

    public function servicosAtivos()
    {

        return "SELECT 
           COALESCE(
                CONCAT(pf_cliente.pf_nome, ' ', pf_cliente.pf_sobrenome),
                pj_cliente.pj_nomeFantasia
            ) AS nome,
            u_cliente.usuarios_imagem as usuariosImagem,
            u_cliente.usuarios_id,
            u_cliente.usuarios_email as email,
            u_cliente.usuarios_telefone as telefone,
            e.endereco_rua as rua,
            e.endereco_complemento as complemento,
            e.endereco_bairro as bairro,
            e.endereco_numero as numero,
            e.endereco_descricao as descricao,
            e.endereco_cidade as cidade,
            e.endereco_uf as uf,
            so.solicitacao_id,
            so.solicitacao_data_atual as solicitacao_data_atual,
            so.solicitacao_data as solicitacao_data,
            so.solicitacao_quantidade as quantidade,
            servicos_nome,
            so.solicitacao_observacao as observacao,
            servicos_id


            from solicitacaoServico

            INNER JOIN solicitacao so on solicitacaoServico_solicitacao_id = so.solicitacao_id
            INNER JOIN servicos on solicitacaoServico_servicos_id = servicos_id
            INNER JOIN usuarios u_cliente ON u_cliente.usuarios_id = so.solicitacao_usuarios_id
            
            -- Instância 2: O Dono do serviço (O Profissional)
            LEFT JOIN pessoaFisica pf_cliente ON pf_cliente.pf_usuarios_id = u_cliente.usuarios_id 
            LEFT JOIN pessoaJuridica pj_cliente ON pj_cliente.pj_usuarios_id = u_cliente.usuarios_id
            left JOIN endereco e on e.endereco_usuarios_id = u_cliente.usuarios_id
            
            -- Filtra pelo ID do cliente logado e status Pendente
            WHERE servicos_usuarios_id = '$this->usuarioId' AND so.solicitacao_status = 'Ativo'
            ORDER BY so.solicitacao_id DESC";
    }



    public function dadosEmailSolicitacao($solicitacaoId, $usuarioId)
    {
        return "
        SELECT

            -- EMAIL DO CLIENTE
            u_cliente.usuarios_email AS email,

            -- NOME DO PROFISSIONAL LOGADO
            COALESCE(
                CONCAT(pf_prof.pf_nome, ' ', pf_prof.pf_sobrenome),
                pj_prof.pj_nomeFantasia
            ) AS nome,

            -- NOME DO SERVIÇO
            s.servicos_nome AS servico

        FROM solicitacaoServico ss

        INNER JOIN solicitacao so 
            ON so.solicitacao_id = ss.solicitacaoServico_solicitacao_id

        INNER JOIN servicos s 
            ON s.servicos_id = ss.solicitacaoServico_servicos_id

        -- CLIENTE
        INNER JOIN usuarios u_cliente 
            ON u_cliente.usuarios_id = so.solicitacao_usuarios_id

        -- PROFISSIONAL DONO DO SERVIÇO
        INNER JOIN usuarios u_prof 
            ON u_prof.usuarios_id = s.servicos_usuarios_id

        LEFT JOIN pessoaFisica pf_prof 
            ON pf_prof.pf_usuarios_id = u_prof.usuarios_id

        LEFT JOIN pessoaJuridica pj_prof 
            ON pj_prof.pj_usuarios_id = u_prof.usuarios_id

        WHERE so.solicitacao_id = '$solicitacaoId'
        AND s.servicos_usuarios_id =  '$usuarioId'
    ";
    }
}
