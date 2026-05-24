<?php

namespace Controllers;


use \Pdo;
use \Models\Database as Conexao;
use \Utils\RenderView;
 
class Profissionais extends RenderView
{

    private $servicos;
    private $solicitacaoServico;
    private $avaliacao;
    private $view;



    public function __construct()
    {

        $this->servicos = new Conexao('servicos');
        $this->avaliacao = new Conexao('avaliacao');
        $this->solicitacaoServico = new Conexao('solicitacaoServico');
        $this->view = new \Models\View('vw_profissionais');
    }

    protected function redirect($path, $mensagem = null)
    {
        if ($mensagem) {
            $_SESSION['msg'] = $mensagem;
        }
        header("Location: {$path}");
        exit();
    }

    // Metodo para exibir o perfil do profissional
    // Usado na tela de cliente para exibir o perfil do profissional selecionado
    public function perfil($usuarios_id)
    {

        $data = [];
        $data['pagina'] = 'Perfil do profissional';

        $profissional = $this->view->listarPorId($usuarios_id);

        
        // Recebe o metodo com o return
        $comentarios = $this->comentarios($usuarios_id);

        $data['comentarios'] = $this->avaliacao->selectProfissionais($comentarios)->fetchAll(PDO::FETCH_OBJ);

        
        $data['dadosProfissional'] = $profissional;
        return $this->loadView('user/homeCliente/perfil', $data);
    }



    public function comentarios($usuariosAvaliadoId)
    {

        return  "
            SELECT 
                a.avaliacao_id,
                a.avaliacao_assunto AS assunto,
                a.avaliacao_descricao AS descricao,
                a.avaliacao_notas AS notas,
                a.avaliacao_data AS data,
                u.usuarios_imagem AS imagem,

                COALESCE(
                    CONCAT(pf.pf_nome, ' ', pf.pf_sobrenome),
                    pj.pj_nomeFantasia
                ) AS nome

            FROM avaliacao a

            INNER JOIN usuarios u 
                ON u.usuarios_id = a.avaliador_usuarios_id

            LEFT JOIN pessoaFisica pf 
                ON pf.pf_usuarios_id = u.usuarios_id

            LEFT JOIN pessoaJuridica pj 
                ON pj.pj_usuarios_id = u.usuarios_id

            WHERE a.avaliado_usuarios_id = '$usuariosAvaliadoId'

            ORDER BY a.avaliacao_data DESC";
    }
}
