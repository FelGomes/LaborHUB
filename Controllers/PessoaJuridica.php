<?php


namespace Controllers;

use \Models\Database as Conexao;
use \PDO;

use \Utils\RenderView;


class PessoaJuridica extends RenderView
{

    private $pessoaJuridica;
    private $solicitacaoServico;
    private $usuarioId;
    private $solicitacao;

    public function __construct()
    {
        $this->pessoaJuridica = new Conexao('pessoaJuridica');
        $this->solicitacaoServico = new Conexao('solicitacaoServico');
        $this->usuarioId = $_SESSION['usuarios_logado']->usuarios_id;
        $this->solicitacao = new Conexao('solicitacao');
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
        } else {

            $_SESSION['msg'] = [
                'texto' => 'Erro ao aceitar solicitação de serviço. Tente novamente!',
                'color' => 'danger',
            ];
        }

        return $this->redirect(base_url('user/homeProfissional/index'));

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
}
