<?php


namespace Controllers;

use \Models\Database as Conexao;
use \PDO;

use \Utils\RenderView;


class Historico extends RenderView
{

    private $endereco;
    private $usuarioID;
    private $solicitacaoServico;
    private $solicitacao;
    private $avaliacao;

    public function __construct()
    {
        $this->usuarioID = $_SESSION['usuarios_logado']->usuarios_id;
        $this->solicitacaoServico = new Conexao('solicitacaoServico');
        $this->solicitacao = new Conexao('solicitacao');
        $this->avaliacao = new Conexao('avaliacao');
    }

    protected function redirect($path, $mensagem = null)
    {
        if ($mensagem) {
            $_SESSION['msg'] = $mensagem;
        }
        header("Location: {$path}");
        exit();
    }


    // Listar historico com servicos finalizado, pendente e recusados
    public function index()
    {

        $data = [];
        $data['historico'] = 'Historico';

        //Historico finalizado
        $servicoFinalizado = $this->listarHistoricoFinalizado();
        $data['servicosFinalizados'] = $this->solicitacaoServico->selectProfissionais($servicoFinalizado)->fetchAll(PDO::FETCH_OBJ);

        //
        $servicoPendente = $this->listarHistoricoPendente();
        $data['servicosPendentes'] = $this->solicitacaoServico->selectProfissionais($servicoPendente)->fetchAll(PDO::FETCH_OBJ);

        $servicoRecusado = $this->listarHistoricoRecusado();
        $data['servicosRecusados'] = $this->solicitacaoServico->selectProfissionais($servicoRecusado)->fetchAll(PDO::FETCH_OBJ);



        return $this->loadView('user/homeCliente/historico', $data);
    }

    // Cancelar solicitação pendente
    public function cancelar($solicitacaoId)
    {

        if (!$solicitacaoId) {
            return $this->redirect(base_url('historico/index'));
        }

        $values = [
            'solicitacao_status' => 'Cancelado',
            'solicitacao_status_profissional' => 'Cancelado'
        ];

        $where = "solicitacao_id = '$solicitacaoId'";

        $this->solicitacao->update($where, $values);


        if ($this->solicitacao->update($where, $values)) {
            $_SESSION['msg'] = ['texto' => 'Solicitação cancelada com sucesso!', 'color' => 'success'];
        } else {

            $_SESSION['msg'] = ['texto' => 'Erro ao cancelar esta solicitação, tente novamente!', 'color' => 'danger'];
        }

        return $this->redirect(base_url('historico/index'));
    }

    // Funçao para deletar todas solicitações recusada
    public function deletarAll()
    {

        $valuesRecusado = [
            'solicitacao_status' => 'Excluido',
            'solicitacao_deletada_em' => date('Y-m-d'),
        ];

        $where = "solicitacao_usuarios_id = '$this->usuarioID'";

        if ($this->solicitacao->update($where, $valuesRecusado)) {
            $_SESSION['msg'] = ['texto' => 'Solicitação excluída com sucesso!', 'color' => 'success'];
        } else {
            $_SESSION['msg'] = ['texto' => 'Erro ao excluir as solicitações, tente novamente!', 'color' => 'danger'];
        }

        return $this->redirect(base_url('historico/index'));
    }

    // Funçao para deletar uma solicitação recusada em especifico
    public function deletarUnique($solicitacaoID)
    {
        if (!$solicitacaoID) {
            return $this->redirect(base_url('historico/index'));
        }

        $values = [
            'solicitacao_status' => 'Excluído',
        ];

        $where = "solicitacao_id = '$solicitacaoID'";

        $this->solicitacao->update($where, $values);


        if ($this->solicitacao->update($where, $values)) {
            $_SESSION['msg'] = ['texto' => 'Solicitação excluída com sucesso!', 'color' => 'success'];
        } else {

            $_SESSION['msg'] = ['texto' => 'Erro ao excluír esta solicitação, tente novamente!', 'color' => 'danger'];
        }

        return $this->redirect(base_url('historico/index'));
    }



    public function detalharServicoFinalizado($solicitacaoID)
    {

        $detalhamento = $this->detalharProfissional($solicitacaoID);
        $data['detalhamento'] = $this->solicitacaoServico->selectProfissionais($detalhamento)->fetch(PDO::FETCH_OBJ);

        return $this->loadView('user/homeCliente/detalhamentoHistorico', $data);
    }


    public function avaliarProfissional()
    {

        $valuesAvaliacao = [
            'avaliacao_assunto' => $_POST['avaliacao_assunto'] ?? '',
            'avaliacao_descricao' => $_POST['avaliacao_descricao'] ?? '',
            'avaliacao_notas'      => $_POST['avaliacao_notas'] ?? '',
            'avaliacao_data'       => date('Y-m-d'),
            'avaliador_usuarios_id' => $_POST['cliente_id'],
            'avaliado_usuarios_id'  => $_POST['profissional_id'],
            'avaliacao_solicitacao_id' => $_POST['solicitacao_id']

        ];

        if (empty($valuesAvaliacao['avaliacao_assunto'])) {
            $_SESSION['msg'] = [
                'texto' => 'O campo de assunto não pode ser vazio!',
                'color' => 'danger',
            ];

            return $this->detalharServicoFinalizado($_POST['solicitacao_id']);
        }


        if ($this->avaliacao->insert($valuesAvaliacao)) {
            $_SESSION['msg'] = [
                'texto' => 'Comentário enviado com sucesso!',
                'color' => 'success',
            ];
        } else {
            $_SESSION['msg'] = [
                'texto' => 'Erro ao enviar comentario!',
                'color' => 'danger',
            ];
        }

        return $this->detalharServicoFinalizado($_POST['solicitacao_id']);
    }


    public function editarAvaliacao()
    {
        $avaliacaoID = $_POST['avaliacao_id'] ?? '';

        $where = "avaliacao_id = '$avaliacaoID'";

        $avaliacaoAtual = $this->avaliacao->select(null, $where)->fetch(PDO::FETCH_OBJ);


        $dadosNovos = [
            'avaliacao_notas' => trim($_POST['avaliacao_notas'] ?? ''),
            'avaliacao_assunto' => trim($_POST['avaliacao_assunto'] ?? ''),
            'avaliacao_descricao' => trim($_POST['avaliacao_descricao'] ?? ''),
        ];

        $dadosAntigos = [
            'avaliacao_notas' => trim($avaliacaoAtual->avaliacao_notas),
            'avaliacao_assunto' => trim($avaliacaoAtual->avaliacao_assunto),
            'avaliacao_descricao' => trim($avaliacaoAtual->avaliacao_descricao),

        ];



        if ($dadosNovos == $dadosAntigos) {

            $_SESSION['msg'] = [
                'texto' => 'Nenhum dado foi alterado!',
                'color' => 'warning',
            ];
            return $this->detalharServicoFinalizado($_POST['solicitacao_id']);
        }


        if ($this->avaliacao->update($where, $dadosNovos)) {
            $_SESSION['msg'] = [
                'texto' => 'Comentário editado com sucesso!',
                'color' => 'success',
            ];
        } else {
            $_SESSION['msg'] = [
                'texto' => 'Erro ao editar comentario!',
                'color' => 'danger',
            ];
        }

        return $this->detalharServicoFinalizado($_POST['solicitacao_id']);
    }


    // Vai listar todas as solicitações que foram finalizadas pelo profissional - view historico
    public function listarHistoricoFinalizado()
    {
        return "SELECT 
        s.servicos_nome as servico,
        s.servicos_data as servico_data,
        s.servicos_valor as valor,
        s.servicos_tipo_cobranca as cobranca,
        s.servicos_nivel_experiencia as experiencia,
        
        -- Buscando o nome do PROFISSIONAL que prestou o serviço
        COALESCE(
            CONCAT(pf_prof.pf_nome, ' ', pf_prof.pf_sobrenome),
            pj_prof.pj_nomeFantasia
        ) AS nome,
        pf_prof.pf_genero as genero,
        pj_prof.pj_cnpj as cnpj,
        
        -- Dados de contato e foto do PROFISSIONAL
        u_prof.usuarios_imagem as usuariosImagem,
        u_prof.usuarios_telefone as telefone,
        
        -- Dados da avaliação que o cliente fez para ESTE servisolicitacao_data_atualço específico
        a.avaliacao_assunto as assunto,
        a.avaliacao_descricao as descricao,
        a.avaliacao_notas as nota,
        a.avaliacao_data as avaliacao_data,
        
        so.solicitacao_data as solicitacao_data,
        so.solicitacao_data_atual as solicitacao_data_atual,
        so.solicitacao_conclusao as solicitacao_conclusao,
        so.solicitacao_quantidade as quantidade,
        so.solicitacao_id

        FROM solicitacaoServico ss

        INNER JOIN solicitacao so ON so.solicitacao_id = ss.solicitacaoServico_solicitacao_id
        INNER JOIN servicos s ON s.servicos_id = ss.solicitacaoServico_servicos_id
        
        INNER JOIN usuarios u_cliente ON u_cliente.usuarios_id = so.solicitacao_usuarios_id
        
        INNER JOIN usuarios u_prof ON u_prof.usuarios_id = s.servicos_usuarios_id
        LEFT JOIN pessoaFisica pf_prof ON pf_prof.pf_usuarios_id = u_prof.usuarios_id 
        LEFT JOIN pessoaJuridica pj_prof ON pj_prof.pj_usuarios_id = u_prof.usuarios_id
        
        LEFT JOIN avaliacao a ON a.avaliacao_solicitacao_id = so.solicitacao_id 
        
        -- Filtra pelo ID do cliente logado e status Finalizado
        WHERE u_cliente.usuarios_id = '$this->usuarioID' AND so.solicitacao_status = 'Finalizado'
        ORDER BY so.solicitacao_conclusao DESC";
    }

    // Selec para listar dados de solicitações pendentes - viww historico
    public function listarHistoricoPendente()
    {
        return "SELECT 
            
            s.servicos_nome as servico,
            s.servicos_data as servico_data,
            s.servicos_valor as valor,
            s.servicos_tipo_cobranca as cobranca,
            s.servicos_nivel_experiencia as experiencia,
            
            -- Buscando o nome do PROFISSIONAL que recebeu a solicitação
            COALESCE(
                CONCAT(pf_prof.pf_nome, ' ', pf_prof.pf_sobrenome),
                pj_prof.pj_nomeFantasia
            ) AS nome,
            
            -- Dados de contato e foto do PROFISSIONAL
            u_prof.usuarios_imagem as usuariosImagem,
            u_prof.usuarios_telefone as telefone,
            
            -- Dados da solicitação
            so.solicitacao_id,
            so.solicitacao_observacao as descricao_solicitacao,
            so.solicitacao_data as solicitacao_data,
            so.solicitacao_data_atual as solicitacao_data_atual,
            so.solicitacao_quantidade as quantidade

            FROM solicitacaoServico ss

            -- Liga a tabela pivô com a solicitação e o serviço
            INNER JOIN solicitacao so ON so.solicitacao_id = ss.solicitacaoServico_solicitacao_id
            INNER JOIN servicos s ON s.servicos_id = ss.solicitacaoServico_servicos_id
            
            -- Instância 1: O Cliente que fez a solicitação (Você)
            INNER JOIN usuarios u_cliente ON u_cliente.usuarios_id = so.solicitacao_usuarios_id
            
            -- Instância 2: O Dono do serviço (O Profissional)
            INNER JOIN usuarios u_prof ON u_prof.usuarios_id = s.servicos_usuarios_id
            LEFT JOIN pessoaFisica pf_prof ON pf_prof.pf_usuarios_id = u_prof.usuarios_id 
            LEFT JOIN pessoaJuridica pj_prof ON pj_prof.pj_usuarios_id = u_prof.usuarios_id
            
            -- Filtra pelo ID do cliente logado e status Pendente
            WHERE u_cliente.usuarios_id = '$this->usuarioID' AND so.solicitacao_status = 'Pendente'
            ORDER BY so.solicitacao_id DESC";
    }

    // Selec para retornar dados de solicitações recusados - view historico
    public function listarHistoricoRecusado()
    {
        return "SELECT 
            
            s.servicos_nome as servico,
            s.servicos_data as servico_data,
            s.servicos_valor as valor,
            s.servicos_tipo_cobranca as cobranca,
            s.servicos_nivel_experiencia as experiencia,
            
            -- Buscando o nome do PROFISSIONAL que recebeu a solicitação
            COALESCE(
                CONCAT(pf_prof.pf_nome, ' ', pf_prof.pf_sobrenome),
                pj_prof.pj_nomeFantasia
            ) AS nome,
            
            -- Dados de contato e foto do PROFISSIONAL
            u_prof.usuarios_imagem as usuariosImagem,
            u_prof.usuarios_telefone as telefone,
            
            -- Dados da solicitação
            so.solicitacao_id,
            so.solicitacao_observacao as descricao_solicitacao,
            so.solicitacao_data as solicitacao_data,
            so.solicitacao_data_atual as solicitacao_data_atual,
            so.solicitacao_quantidade as quantidade,
            so.solicitacao_motivo as motivo

            FROM solicitacaoServico ss

            -- Liga a tabela pivô com a solicitação e o serviço
            INNER JOIN solicitacao so ON so.solicitacao_id = ss.solicitacaoServico_solicitacao_id
            INNER JOIN servicos s ON s.servicos_id = ss.solicitacaoServico_servicos_id
            
            -- Instância 1: O Cliente que fez a solicitação (Você)
            INNER JOIN usuarios u_cliente ON u_cliente.usuarios_id = so.solicitacao_usuarios_id
            
            -- Instância 2: O Dono do serviço (O Profissional)
            INNER JOIN usuarios u_prof ON u_prof.usuarios_id = s.servicos_usuarios_id
            LEFT JOIN pessoaFisica pf_prof ON pf_prof.pf_usuarios_id = u_prof.usuarios_id 
            LEFT JOIN pessoaJuridica pj_prof ON pj_prof.pj_usuarios_id = u_prof.usuarios_id
            
            -- Filtra pelo ID do cliente logado e status Pendente
            WHERE u_cliente.usuarios_id = '$this->usuarioID' AND so.solicitacao_status = 'Recusado'
            ORDER BY so.solicitacao_id DESC";
    }

    public function detalharProfissional($solicitacaoId)
    {
        return "SELECT 
        s.servicos_nome as servico,
        s.servicos_data as servico_data,
        s.servicos_valor as valor,
        s.servicos_tipo_cobranca as cobranca,
        s.servicos_nivel_experiencia as experiencia,
        
        -- Buscando o nome do PROFISSIONAL que prestou o serviço
        COALESCE(
            CONCAT(pf_prof.pf_nome, ' ', pf_prof.pf_sobrenome),
            pj_prof.pj_nomeFantasia
        ) AS nome,
        pf_prof.pf_genero as genero,
        pj_prof.pj_cnpj as cnpj,
        
        -- Dados de contato e foto do PROFISSIONAL
        u_prof.usuarios_imagem as usuariosImagem,
        u_prof.usuarios_telefone as telefone,
        u_prof.usuarios_email as email,
        u_prof.usuarios_id as profissional_id,

        u_cliente.usuarios_id as cliente_id,
        
        -- Dados da avaliação que o cliente fez para ESTE serviço específico
        a.avaliacao_id,
        a.avaliacao_assunto as assunto,
        a.avaliacao_descricao as descricao,
        a.avaliacao_notas as nota,
        a.avaliacao_data as avaliacao_data,
        a.avaliacao_resposta as resposta,
        
        
        so.solicitacao_data as solicitacao_data,
        so.solicitacao_data_atual as solicitacao_data_atual,
        so.solicitacao_conclusao as solicitacao_conclusao,
        so.solicitacao_quantidade as quantidade,
        so.solicitacao_id,
        e.endereco_cidade as cidade,
        e.endereco_uf as uf

        FROM solicitacaoServico ss

        INNER JOIN solicitacao so ON so.solicitacao_id = ss.solicitacaoServico_solicitacao_id
        INNER JOIN servicos s ON s.servicos_id = ss.solicitacaoServico_servicos_id
        
        INNER JOIN usuarios u_cliente ON u_cliente.usuarios_id = so.solicitacao_usuarios_id

        
        INNER JOIN usuarios u_prof ON u_prof.usuarios_id = s.servicos_usuarios_id
        INNER JOIN endereco e on e.endereco_usuarios_id = u_prof.usuarios_id
        LEFT JOIN pessoaFisica pf_prof ON pf_prof.pf_usuarios_id = u_prof.usuarios_id 
        LEFT JOIN pessoaJuridica pj_prof ON pj_prof.pj_usuarios_id = u_prof.usuarios_id
        
         LEFT JOIN avaliacao a ON a.avaliacao_solicitacao_id = so.solicitacao_id 
        
        -- Filtra pelo ID do cliente logado e status Finalizado
        WHERE u_cliente.usuarios_id = '$this->usuarioID' AND so.solicitacao_status = 'Finalizado' AND so.solicitacao_id = '$solicitacaoId'
        ORDER BY so.solicitacao_conclusao DESC";
    }
}
