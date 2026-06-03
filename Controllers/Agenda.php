<?php


namespace Controllers;

use \Models\Database as Conexao;
use \PDO;

use \Utils\RenderView;

class Agenda extends RenderView
{
    private $usuario;
    private $usuarioID;


    public function __construct()
    {
        $this->usuario = new Conexao('usuarios');
        $this->usuarioID = $_SESSION['usuarios_logado']->usuarios_id ?? null;
    }

    public function index() {
        $data = [];

        $data['Agenda'] = 'Agenda';

        $data['ativos'] = $this->listarHistoricoAtivo();


        return $this->loadView('user/homeCliente/agenda', $data);
    }




     public function listarHistoricoAtivo()
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
        WHERE u_cliente.usuarios_id = '$this->usuarioID' AND so.solicitacao_status = 'Ativo' AND so.solicitacao_conclusao IS NOT NULL
        ORDER BY so.solicitacao_conclusao DESC";
    }
}
