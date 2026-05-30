<?php


namespace Controllers;

use DateTime;
use \Models\Database as Conexao;
use \Utils\Email as Email;
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
    private $profissionalId;

    public function __construct()
    {
        $this->pessoaFisica = new Conexao('pessoaFisica');
        $this->listaProfissionais = new Profissionais();
        $this->servicos = new Conexao('servicos');
        $this->view = new \Models\View('vw_profissionais');
        $this->endereco = new Conexao('endereco');
        $this->solicitacao = new Conexao('solicitacao');
        $this->solicitacaoServicos = new Conexao('solicitacaoServico');
        $this->profissionalId = $_POST['profissional_id'] ?? '';
    }


    protected function redirect($path, $mensagem = null)
    {
        if ($mensagem) {
            $_SESSION['msg'] = $mensagem;
        }
        header("Location: {$path}");
        exit();
    }



    // Lisrar a tela de usaurio tipo cliente
    public function index()
    {
        $data = [];
        $data['pagina'] = 'Pessoa Fisica';

      
        $profissional = $this->view->listarTodos();

        $data['listaProfissionais'] = $profissional;

        return $this->loadView('user/homeCliente/index', $data);
    }


    // Função para enviar solicitação de serviço para usuario
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
            'solicitacao_status_profissional' => 'Pendente',
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

        

       

        if($values['solicitacao_quantidade'] > 60) {
            $_SESSION['msg'] = ['texto' => "Não é possível solicitar serviço para mais de 2 meses!", 'color' => 'danger'];
            return $this->listaProfissionais->perfil($profissionalId);
            
        }

        if (strtotime($values['solicitacao_data']) < strtotime($dataAtual)) {
            $_SESSION['msg'] = ['texto' => "A data informada não pode ser menor que a data atual.", 'color' => 'danger'];
            return $this->listaProfissionais->perfil($profissionalId);
        }

        $dataLimite = (new DateTime())->modify('+2 months');

        if(strtotime($values['solicitacao_data']) > strtotime($dataLimite->format('Y-m-d'))){
             $_SESSION['msg'] = ['texto' => "Você não pode solicitar serviço para daqui 2 meses ou mais!", 'color' => 'danger'];
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

                $dadosUsuario = $this->dadosEmailSolicitacao($profissionalId);
                $emailDados = $this->solicitacaoServicos->selectProfissionais($dadosUsuario)->fetch(PDO::FETCH_OBJ);


                $email = new Email();
                $email->enviarSolicitacao($emailDados->email);





            } else {
                $_SESSION['msg'] = ['texto' => "Erro ao solicitar serviço!", 'color' => 'danger'];
            }
        }

        return $this->listaProfissionais->perfil($profissionalId); // ← sempre volta para o perfil
    }

    // Buscar endereco de usaurio que enviou solicitaçao
    public function buscarEndereco()
    {
        $usuarioId = $_SESSION['usuarios_logado']->usuarios_id;
        $join = "INNER JOIN usuarios on usuarios_id = endereco_usuarios_id";
        $where = "usuarios_id = '$usuarioId'";


        return $this->endereco->select($join, $where)->fetch(PDO::FETCH_OBJ);
    }


    // FUnção para enviar email para prestador de serviço
    public function dadosEmailSolicitacao($usuarioId)
    {
        return "
        SELECT

            -- EMAIL DO CLIENTE
            u_prof.usuarios_email AS email


        FROM solicitacaoServico ss

        INNER JOIN servicos s 
            ON s.servicos_id = ss.solicitacaoServico_servicos_id

        -- PROFISSIONAL DONO DO SERVIÇO
        INNER JOIN usuarios u_prof 
            ON u_prof.usuarios_id = s.servicos_usuarios_id

        LEFT JOIN pessoaFisica pf_prof 
            ON pf_prof.pf_usuarios_id = u_prof.usuarios_id

        LEFT JOIN pessoaJuridica pj_prof 
            ON pj_prof.pj_usuarios_id = u_prof.usuarios_id

        WHERE s.servicos_usuarios_id =  '$usuarioId'
    ";
    }
}
