<?php


namespace Controllers;

use \Models\Database as Conexao;
use \PDO;

use \Utils\RenderView;


class HistoricoProfissional extends RenderView
{

    private $endereco;
    private $usuarioID;
    private $solicitacaoServico;
    private $solicitacao;

    public function __construct()
    {
        $this->usuarioID = $_SESSION['usuarios_logado']->usuarios_id;
        $this->solicitacaoServico = new Conexao('solicitacaoServico');
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


    // Listar historico com servicos finalizado, pendente e recusados
    public function index()
    {

        $data = [];
        $data['historico'] = 'Historico';

        $dadosFinalizados = $this->listarHistoricoFinalizado();
        $data['historicoFinalizado'] = $this->solicitacaoServico->selectProfissionais($dadosFinalizados)->fetchAll(PDO::FETCH_OBJ);

        $dadosRecusado = $this->listarHistoricoRecusado();
        $data['historicoRecusado'] = $this->solicitacaoServico->selectProfissionais($dadosRecusado)->fetchAll(PDO::FETCH_OBJ);


        return $this->loadView('user/homeProfissional/historicoProfissional', $data);
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
            return $this->index();
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

        return $this->index();
    }



    // Vai listar todas as solicitações que foram finalizadas pelo profissional - view historico
    // Selec para listar dados de solicitações pendentes - viww historico
    public function listarHistoricoFinalizado()
    {
        return "SELECT 
            
            s.servicos_valor as valor,
            COALESCE(
                CONCAT(pf_cliente.pf_nome, ' ', pf_cliente.pf_sobrenome),
                pj_cliente.pj_nomeFantasia
            ) AS nome,
            
            -- Dados de contato e foto do PROFISSIONAL
            u_cliente.usuarios_imagem as usuariosImagem,
            u_cliente.usuarios_telefone as telefone,

            -- endereco do cliente
        
            CONCAT(e.endereco_rua, ' ', e.endereco_complemento, ' Nº ', e.endereco_numero, ' ', e.endereco_bairro) as endereco,
            

            CONCAT(e.endereco_cidade, ' - ', e.endereco_uf) as cidade,
            
            
            -- Dados da solicitação
            so.solicitacao_id,
            so.solicitacao_data as solicitacao_data,
            so.solicitacao_data_atual as solicitacao_data_atual,
            so.solicitacao_quantidade as quantidade,
            so.solicitacao_conclusao as conclusao

            FROM solicitacaoServico ss

            -- Liga a tabela pivô com a solicitação e o serviço
            INNER JOIN solicitacao so ON so.solicitacao_id = ss.solicitacaoServico_solicitacao_id
            INNER JOIN servicos s ON s.servicos_id = ss.solicitacaoServico_servicos_id
            
            -- Instância 1: O Cliente que fez a solicitação (Você)
            INNER JOIN usuarios u_cliente ON u_cliente.usuarios_id = so.solicitacao_usuarios_id

            INNER JOIN endereco e on e.endereco_usuarios_id = u_cliente.usuarios_id
            
            -- Instância 2: O Dono do serviço (O Profissional)
            INNER JOIN usuarios u_prof ON u_prof.usuarios_id = s.servicos_usuarios_id
            LEFT JOIN pessoaFisica pf_cliente ON pf_cliente.pf_usuarios_id = u_cliente.usuarios_id 
            LEFT JOIN pessoaJuridica pj_cliente ON pj_cliente.pj_usuarios_id = u_cliente.usuarios_id
            
            -- Filtra pelo ID do cliente logado e status Pendente
            WHERE u_prof.usuarios_id = '$this->usuarioID' AND so.solicitacao_status = 'Finalizado'
            ORDER BY so.solicitacao_id DESC";
    }


    // Listagem de serviços recusados
   public function listarHistoricoRecusado()
    {
        return "SELECT 
            
            s.servicos_valor as valor,
            COALESCE(
                CONCAT(pf_cliente.pf_nome, ' ', pf_cliente.pf_sobrenome),
                pj_cliente.pj_nomeFantasia
            ) AS nome,
            
            -- Dados de contato e foto do PROFISSIONAL
            u_cliente.usuarios_imagem as usuariosImagem,
            u_cliente.usuarios_telefone as telefone,

            -- endereco do cliente
        
            CONCAT(e.endereco_rua, ' ', e.endereco_complemento, ' Nº ', e.endereco_numero, ' ', e.endereco_bairro) as endereco,
            

            CONCAT(e.endereco_cidade, ' - ', e.endereco_uf) as cidade,
            
            
            -- Dados da solicitação
            so.solicitacao_id,
            so.solicitacao_data as solicitacao_data,
            so.solicitacao_data_atual as solicitacao_data_atual,
            so.solicitacao_quantidade as quantidade,
            so.solicitacao_conclusao as conclusao,
            s.servicos_id

            FROM solicitacaoServico ss

            -- Liga a tabela pivô com a solicitação e o serviço
            INNER JOIN solicitacao so ON so.solicitacao_id = ss.solicitacaoServico_solicitacao_id
            INNER JOIN servicos s ON s.servicos_id = ss.solicitacaoServico_servicos_id
            
            -- Instância 1: O Cliente que fez a solicitação (Você)
            INNER JOIN usuarios u_cliente ON u_cliente.usuarios_id = so.solicitacao_usuarios_id

            INNER JOIN endereco e on e.endereco_usuarios_id = u_cliente.usuarios_id
            
            -- Instância 2: O Dono do serviço (O Profissional)
            INNER JOIN usuarios u_prof ON u_prof.usuarios_id = s.servicos_usuarios_id
            LEFT JOIN pessoaFisica pf_cliente ON pf_cliente.pf_usuarios_id = u_cliente.usuarios_id 
            LEFT JOIN pessoaJuridica pj_cliente ON pj_cliente.pj_usuarios_id = u_cliente.usuarios_id
            
            -- Filtra pelo ID do cliente logado e status Pendente
            WHERE u_prof.usuarios_id = '$this->usuarioID' AND so.solicitacao_status = 'Recusado'
            ORDER BY so.solicitacao_id DESC";
    }
}
