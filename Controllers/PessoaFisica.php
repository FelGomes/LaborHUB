<?php


namespace Controllers;

use \Models\Database as Conexao;
use \PDO;

use \Utils\RenderView;


class PessoaFisica extends RenderView
{

    private $pessoaFisica;
    private $listaProfissionais;
    private $servicos;
    private $view;
    private $endereco;
    private $solicitacao;
    private $solicitacaoServicos;

    public function __construct()
    {
        $this->pessoaFisica = new Conexao('pessoaFisica');
        $this->listaProfissionais = new Profissionais();
        $this->servicos = new Conexao('servicos');
        $this->view = new \Models\View('vw_profissionais');
        $this->endereco = new Conexao('endereco');
        $this->solicitacao = new Conexao('solicitacao');
        $this->solicitacaoServicos = new Conexao('solicitacaoServico');
    }


    protected function redirect($path, $mensagem = null)
    {
        if ($mensagem) {
            $_SESSION['msg'] = $mensagem;
        }
        header("Location: {$path}");
        exit();
    }




    public function index()
    {
        $data = [];
        $data['pagina'] = 'Pessoa Fisica';


        // recebe o select com o return
        $profissional = $this->view->listarTodos();

        $data['listaProfissionais'] = $profissional;



        return $this->loadView('user/homeCliente/index', $data);
    }



    public function enviarSolicitacao()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->redirect(base_url('user/homeCliente/index'));
        }

        $usuarioId      = $_SESSION['usuarios_logado']->usuarios_id;
        $endereco       = $this->buscarEndereco();
        $dataAtual      = date('Y-m-d');
        $servicosID     = $_POST['servicos_id'] ?? '';
        $profissionalId = $_POST['profissional_id'] ?? '';  // ← ID do profissional

        $values = [
            'solicitacao_data'        => $_POST['solicitacao_data'],
            'solicitacao_data_atual'  => $dataAtual,
            'solicitacao_quantidade'  => $_POST['solicitacao_quantidade'],
            'solicitacao_observacao'  => $_POST['solicitacao_observacao'],
            'solicitacao_status'      => 'Pendente',
            'solicitacao_endereco_id' => $endereco->endereco_id,
            'solicitacao_usuarios_id' => $usuarioId,
        ];

        if (empty($values['solicitacao_data'])) {
            $_SESSION['msg'] = ['texto' => "Informe uma data para solicitar o serviço!", 'color' => 'danger'];
            return $this->listaProfissionais->perfil($profissionalId); // ← chama direto
        }

        if (empty($values['solicitacao_quantidade'])) {
            $_SESSION['msg'] = ['texto' => "Informe a quantidade de dias!", 'color' => 'danger'];
            return $this->listaProfissionais->perfil($profissionalId);
        }

        if (strtotime($values['solicitacao_data']) < strtotime($dataAtual)) {
            $_SESSION['msg'] = ['texto' => "A data informada não pode ser menor que a data atual.", 'color' => 'danger'];
            return $this->listaProfissionais->perfil($profissionalId);
        }

        if ($values['solicitacao_quantidade'] <= 0) {
            $_SESSION['msg'] = ['texto' => "A quantidade de dias não pode ser 0 ou menor.", 'color' => 'danger'];
            return $this->listaProfissionais->perfil($profissionalId);
        }

        $solicitacaoId = $this->solicitacao->insert($values);

        if ($solicitacaoId) {
            $valuesSolicitacaoServico = [
                'solicitacaoServico_servicos_id'    => $servicosID,
                'solicitacaoServico_solicitacao_id' => $solicitacaoId,
            ];

            if ($this->solicitacaoServicos->insert($valuesSolicitacaoServico)) {
                $_SESSION['msg'] = ['texto' => "Solicitação enviada com sucesso!", 'color' => 'success'];
            } else {
                $_SESSION['msg'] = ['texto' => "Erro ao solicitar serviço!", 'color' => 'danger'];
            }
        }

        return $this->listaProfissionais->perfil($profissionalId); // ← sempre volta para o perfil
    }


    public function buscarEndereco()
    {
        $usuarioId = $_SESSION['usuarios_logado']->usuarios_id;
        $join = "INNER JOIN usuarios on usuarios_id = endereco_usuarios_id";
        $where = "usuarios_id = '$usuarioId'";


        return $this->endereco->select($join, $where)->fetch(PDO::FETCH_OBJ);
    }
}
