<?php

namespace Controllers;

use \Models\Database as Conexao;

use \PDO;
use \Utils\RenderView;
use \Utils\Email;


class Login extends RenderView
{

    private $usuario;

    public function __construct()
    {
        $this->usuario = new Conexao('usuarios');
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
        $data['pagina'] = 'Login';

        // return $this->redirect('login/index');
        return $this->loadView('login/index', $data);
    }


    public function autenticar()
    {


        $post = $_POST;

        if (!isset($post['usuarios_email']) || !isset($post['usuarios_senha_hash'])) {
            $_SESSION['msg'] = [
                'texto' => "Preencha o campo de login!",
                'color' => 'danger',
            ];

            return $this->redirect(base_url('/login'));
        }

        $login = $post['usuarios_email'];
        $senha = ($post['usuarios_senha_hash']);



        $join = 'LEFT JOIN pessoaFisica on pf_usuarios_id = usuarios_id
                LEFT JOIN pessoaJuridica on pj_usuarios_id = usuarios_id
                LEFT JOIN endereco on endereco_usuarios_id = usuarios_id';

        $where = "usuarios_email = ?";
        $usuario = $this->usuario->selectLogin($join, $where, [$login])->fetchObject();


        if (password_verify($senha, $usuario->usuarios_senha_hash)) {
            $_SESSION['usuarios_logado'] = $usuario;

            if($usuario->usuarios_ativo === 0){
                $_SESSION['msg'] = [
                'texto' => 'Usuário excluído pelo administrador!',
                'color' => 'danger',
            ];

            return $this->redirect(base_url('/login'));

            }

            // Se for 0 é usuario normal
            if ($usuario->usuarios_is_admin == 0) {

                if (!empty($usuario->pf_usuarios_id)) {

                    // Se for cliente -> tela de pessoa fisica normal
                    if ($usuario->pf_tipo == 'Cliente') {
                        $_SESSION['msg'] = [
                            'texto' => 'Seja bem vindo ao sistema ' . $usuario->pf_nome . ' ' . $usuario->pf_sobrenome,
                            'color' => 'success',
                        ];

                        return $this->redirect(base_url('user/homeCliente/index'));
                    } else {
                        $_SESSION['msg'] = [
                            'texto' => "Seja bem vindo ao sistema " . $usuario->pj_nomeFantasia,
                            'color' => 'success',
                        ];

                        return $this->redirect(base_url('user/homeProfissional/index'));
                    }
                } elseif (!empty($usuario->pj_usuarios_id)) {

                    if ($usuario->pj_tipo == 'Cliente') {
                        $_SESSION['msg'] = [
                            'texto' => 'Seja bem vindo ao sistema ' . $usuario->pf_nome . ' ' . $usuario->pf_sobrenome,
                            'color' => 'success',
                        ];

                        return $this->redirect(base_url('user/homeCliente/index'));
                    } else {
                        $_SESSION['msg'] = [
                            'texto' => "Seja bem vindo ao sistema " . $usuario->pj_nomeFantasia,
                            'color' => 'success',
                        ];

                        return $this->redirect(base_url('user/homeProfissional/index'));
                    }
                }
            } elseif ($usuario->usuarios_is_admin == 1) {
                // Se for 1 é admin
                $_SESSION['msg'] = [
                    'texto' => 'Seja bem vindo novamente, ADMINISTRADOR!',
                    'color' => 'success',
                ];

                return $this->redirect(base_url('adm/index'));
            } else {
                // se der errado, ele vai considerar como user normal
                $_SESSION['msg'] = [
                    'texto' => 'Não foi possível logar ao sistema. Tente novamente!',
                    'color' => 'danger',
                ];
                return $this->redirect(base_url('/login'));
            }
        } else {

            $_SESSION['msg'] = [
                'texto' => 'Email ou senha inválido!',
                'color' => 'danger',
            ];
            $_SESSION['old'] = $_POST['ususarios_email'];

            return $this->redirect(base_url('/login'));
        }
    }



    public function esqueciSenha()
    {
        return $this->loadView('login/esqueciSenha', []);
    }


    public function enviarEmail()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->loadView('login/esqueciSenha', []);
        }



        $email = $_POST['usuarios_email'] ?? '';

        if (empty($email)) {
            $_SESSION['msg'] = [
                'texto' => 'Informe um email',
                'color' => 'danger',
            ];

            return $this->loadView('login/esqueciSenha', []);
        }


        $where = "usuarios_email = '$email'";
        $usuario = $this->usuario->select(null, $where)->fetch(PDO::FETCH_OBJ);

        if (!$usuario) {
            $_SESSION['msg'] = [
                'texto' => "Email inválido. Tente novamente!",
                'color' => 'danger',
            ];

            return $this->loadView('login/esqueciSenha', []);
        }

        $token = bin2hex(random_bytes(32));

        $usuarios_expira_em = date('Y-m-d H:i:s', strtotime('+1 hour'));


        $values = [
            'usuarios_reset_hash' => $token,
            'usuarios_expira_em' => $usuarios_expira_em,
        ];

        $whereUpdate = "usuarios_id = '$usuario->usuarios_id'";

        $this->usuario->update($whereUpdate, $values);

        $emailClass = new Email();

        $emailC = $emailClass->alterarSenha($usuario->usuarios_email, $token);

        if ($emailC) {
            $_SESSION['msg'] = [
                'texto' => 'Email enviado com sucesso!',
                'color' => 'success',
            ];
        } else {

            $values = [
                'usuarios_reset_hash' => null,
                'usuarios_expira_em' => null,
            ];

            $whereUpdate = "usuarios_id = '$usuario->usuarios_id'";

            $this->usuario->update($whereUpdate, $values);

            $_SESSION['msg'] = [
                'texto' => "Ocorreu um erro ao enviar seu email",
                'color' => 'danger',
            ];
        }

        return $this->loadView('login/esqueciSenha', []);
    }

    public function alterarSenha()
    {

        $token = $_GET['token'] ?? '';

        if (!$token) {
            $_SESSION['msg'] = [
                'texto' => 'Token inválido',
                'color' => 'danger',
            ];

            return $this->redirect(base_url('login'));
        }

        $where = "
        usuarios_reset_hash = '$token'
        and usuarios_expira_em > NOW()
        
        ";

        $usuario = $this->usuario->select(null, $where)->fetch(PDO::FETCH_OBJ);


        if (!$usuario) {
            $_SESSION['msgm'] = [
                'texto' => 'Link expirado, tente novamente!',
                'color' => 'danger',
            ];
            return $this->redirect(base_url('login'));
        }

        $_SESSION['token'] = $token;
        return $this->loadView('login/alterarSenha', []);
    }




    // FUnção para salvar a nova senha
     public function salvarSenha(){

        $senha = $_POST['usuarios_senha_hash'] ?? '';
        $confirmarSenha = $_POST['confirmaSenha'] ?? '';
        $token = $_POST['token'] ?? '';


        if(empty($senha) || empty($confirmarSenha)){
            $_SESSION['msg'] =[
                'texto' => "Preencha os campos abaixo!",
                'color' => 'danger',
            ];

            return $this->loadView('login/alterarSenha', []);
        }


        if($senha !== $confirmarSenha){

            $_SESSION['msg'] = [
                'texto' => 'Os campos de senha não podem ser diferentes!',
                'color' => 'danger',
            ];

            return $this->loadView('login/alterarSenha', []);

        }

        
        if(!$token){
            $_SESSION['msg'] = [
                'texto' => "Token inválido",
                'color' => 'danger',
            ];

            return $this->redirect(base_url('login'));
        }



        $where = "usuarios_reset_hash ='$token'
         AND usuarios_expira_em > NOW()";


         

        $usuario = $this->usuario->select(null,$where)->fetch(PDO::FETCH_OBJ);

        if(!$usuario){
            $_SESSION['msg'] =[
                'texto' => "Token expirado!",
                'color' => 'danger',
            ];

            return $this->redirect(base_url('login'));
        }


        $values = [
            'usuarios_senha_hash' => password_hash($senha, PASSWORD_DEFAULT),

            'usuarios_reset_hash' => null,
            'usuarios_expira_em' => null,
        ];
        

        $whereUpdate = "usuarios_id ='$usuario->usuarios_id'";

        if(!$this->usuario->update($whereUpdate, $values)){
            $_SESSION['msg'] = [
                'texto' => "Erro ao alterar senha!",
                'color' => 'danger',
            ];

            return $this->loadView('login/alterarSenha', []);
        }

        unset($_SESSION['token']);

        $_SESSION['msg'] = [
            'texto' => 'Senha alterada com sucesso!',
            'color' => 'success',
        ];

        return $this->redirect(base_url('login'));


    }





    public function logout()
    {


        $_SESSION['msg'] = [
            'texto' => 'Sessão encerrada com sucesso!',
            'color' => 'success',
        ];
        unset($_SESSION['usuarios_logado']);

        return $this->redirect(base_url('/login'));
    }
}
