<?php

namespace Controllers;

use \Models\Database as Conexao;

use \PDO;
use \Utils\RenderView;


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

                return $this->redirect(base_url('adm/home'));
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
            $_SESSION['old'] = $post;

            return $this->redirect(base_url('/login'));
        }
    }



    public function esqueciSenha()
    {
        return $this->loadView('login/esqueciSenha', []);
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
