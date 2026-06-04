<?php


namespace Controllers;

use \Models\Database as Conexao;
use \PDO;

use \Utils\RenderView;

class Agenda extends RenderView
{
    private $usuario;
    private $usuarioID;
    private $solicitacaoServicos;
    private $solicitacao;


    public function __construct()
    {
        $this->usuario = new Conexao('usuarios');
        $this->usuarioID = $_SESSION['usuarios_logado']->usuarios_id ?? null;
        $this->solicitacaoServicos = new Conexao('solicitacaoServicos');
        $this->solicitacao = new Conexao('solicitacao');
    }

    public function index()
    {
        $data = [];

        $data['Agenda'] = 'Agenda';

        $servicosAtivos = $this->listarHistoricoAtivo();
        $data['ativos'] = $this->solicitacaoServicos->selectProfissionais($servicosAtivos)->fetchAll(PDO::FETCH_OBJ);


        $data['contadorAtivo'] = $this->solicitacao->selectProfissionais($this->contadorServicosAtivo())->fetch(PDO::FETCH_OBJ);
        $data['contadorFinalizado'] = $this->solicitacao->selectProfissionais($this->contadorServicosFinalizado())->fetch(PDO::FETCH_OBJ);
        $data['contadorPendente'] = $this->solicitacao->selectProfissionais($this->contadorServicosPendente())->fetch(PDO::FETCH_OBJ);
        $data['contadorRecusado'] = $this->solicitacao->selectProfissionais($this->contadorServicosRecusado())->fetch(PDO::FETCH_OBJ);


        return $this->loadView('user/homeCliente/agenda', $data);
    }

    private function contadorServicosAtivo()
    {
        return  "SELECT COUNT(solicitacao_status) as total 
        from solicitacao 
        inner join usuarios on solicitacao_usuarios_id = usuarios_id 
        where usuarios_id ='$this->usuarioID' and solicitacao_status = 'Ativo'";
    }

    private function contadorServicosFinalizado()
    {
        return  "SELECT COUNT(solicitacao_status) as total 
        from solicitacao 
        inner join usuarios on solicitacao_usuarios_id = usuarios_id 
        where usuarios_id ='$this->usuarioID' and solicitacao_status = 'Finalizado'";
    }

    private function contadorServicosPendente()
    {
        return  "SELECT COUNT(solicitacao_status) as total 
        from solicitacao 
        inner join usuarios on solicitacao_usuarios_id = usuarios_id 
        where usuarios_id ='$this->usuarioID' and solicitacao_status = 'Pendente'";
    }

    private function contadorServicosRecusado()
    {
        return  "SELECT COUNT(solicitacao_status) as total 
        from solicitacao 
        inner join usuarios on solicitacao_usuarios_id = usuarios_id 
        where usuarios_id ='$this->usuarioID' and solicitacao_status = 'Recusado'";
    }




    public function listarHistoricoAtivo()
    {
        return "SELECT 
        s.servicos_nome as servico,
        s.servicos_valor as valor,
        s.servicos_tipo_cobranca as cobranca,
        
        -- Buscando o nome do PROFISSIONAL que prestou o serviço
        COALESCE(
            CONCAT(pf_prof.pf_nome, ' ', pf_prof.pf_sobrenome),
            pj_prof.pj_nomeFantasia
        ) AS nome,
        pf_prof.pf_genero as genero,
        CONCAT(e.endereco_cidade, ' - ', e.endereco_uf) as cidade,
        
        -- Dados de contato e foto do PROFISSIONAL
        u_prof.usuarios_imagem as usuariosImagem,
        u_prof.usuarios_telefone as telefone,
        
        so.solicitacao_data as solicitacao_data,
        so.solicitacao_conclusao as solicitacao_conclusao,
        so.solicitacao_quantidade as quantidade,
        so.solicitacao_id

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
        WHERE u_cliente.usuarios_id = '$this->usuarioID' AND so.solicitacao_status = 'Ativo' 
        ORDER BY so.solicitacao_data_atual DESC";
    }
}
