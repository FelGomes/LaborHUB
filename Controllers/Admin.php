<?php


namespace Controllers;

use \Models\Database as Conexao;
use \PDO;

use \Utils\RenderView;

class Admin extends RenderView
{

    private $solicitacaoServico;
    private $usuarios;


    public function __construct()
    {
        $this->solicitacaoServico = new Conexao('solicitacaoServico');
        $this->usuarios = new Conexao('usuarios');
    }



    public function index()
    {
        $data = [];
        $data['Admin'] = 'Administrador';

        $cliente = $this->contadorDeSolicitacoesDePF();
        $data['clienteAssiduo'] = $this->solicitacaoServico->selectProfissionais($cliente)->fetchAll(PDO::FETCH_OBJ);

        $profissional = $this->contadorDeSolicitacoesDeProfissional();
        $data['profissionalAssiduo'] = $this->solicitacaoServico->selectProfissionais($profissional)->fetchAll(PDO::FETCH_OBJ);

        $servico = $this->contadorDeServico();
        $data['servicos'] = $this->solicitacaoServico->selectProfissionais($servico)->fetchAll(PDO::FETCH_OBJ);


        return $this->loadView('adm/index', $data);
    }

    // Listar clientes
    public function listarClientes() {

        $tabelaCliente = $this->listasClientes();
        $data['listarClientes'] = $this->usuarios->selectProfissionais($tabelaCliente)->fetchAll(PDO::FETCH_OBJ);

        $tabelaClientePJ = $this->listasClientesPJ();
        $data['listarClientePJ'] = $this->usuarios->selectProfissionais($tabelaClientePJ)->fetchAll(PDO::FETCH_OBJ);

        return $this->loadView('adm/listaCliente', $data);
    }

    public function detalhes($usaurios_id){

        $data = [''];
        $data['detalhes'] = 'Detalhes cliente';

        return $this->loadView('adm/detalhamento', $data);


    }




    // Contador de solicitaçoes de pessoas Fisicas
    private function contadorDeSolicitacoesDePF()
    {
        return "SELECT COUNT(solicitacaoServico_solicitacao_id) as total,
                CONCAT(pf_cliente.pf_nome, ' ', pf_cliente.pf_sobrenome)
                as nome,
                usuarios_imagem as usuariosImagem,
                usuarios_email as email

                from solicitacaoServico

                INNER JOIN solicitacao on solicitacao_id = solicitacaoServico_solicitacao_id
                INNER JOIN usuarios on usuarios_id = solicitacao_usuarios_id
                LEFT JOIN pessoaFisica pf_cliente on usuarios_id = pf_cliente.pf_usuarios_id

                WHERE pf_cliente.pf_tipo = 'Cliente' AND solicitacao_data >= DATE_SUB(NOW(), INTERVAL 1 MONTH)
                GROUP by usuarios_id
                ORDER BY total DESC
                LIMIT 5";
    }

    // Contador de pessoas JUridicas
    private function contadorDeSolicitacoesDeProfissional()
    {
        return "SELECT COUNT(solicitacaoServico_solicitacao_id) as total,
                pj_prof.pj_nomeFantasia as nome,
                usuarios_imagem as usuariosImagem,
                usuarios_email as email

                from solicitacaoServico

                INNER JOIN solicitacao on solicitacao_id = solicitacaoServico_solicitacao_id
                INNER JOIN usuarios on usuarios_id = solicitacao_usuarios_id
                LEFT JOIN pessoaJuridica pj_prof on usuarios_id = pj_prof.pj_usuarios_id

                WHERE pj_prof.pj_tipo = 'Cliente' AND solicitacao_data >= DATE_SUB(NOW(), INTERVAL 1 MONTH)
                GROUP by usuarios_id
                ORDER BY total DESC
                LIMIT 5";
    }

    // COntadro de serviços
    private function contadorDeServico()
    {
        return "SELECT COUNT(solicitacaoServico_servicos_id) as total,
                COALESCE(
                CONCAT(pf_prof.pf_nome, ' ', pf_prof.pf_sobrenome),
                pj_prof.pj_nomeFantasia) as nome,
                usuarios_imagem as usuariosImagem,
                usuarios_email as email,
                servicos_nome

                from solicitacaoServico

                INNER JOIN servicos on servicos_id = solicitacaoServico_servicos_id
                INNER JOIN usuarios on usuarios_id = servicos_usuarios_id
                LEFT JOIN pessoaJuridica pj_prof on usuarios_id = pj_prof.pj_usuarios_id
                LEFT JOIN pessoaFisica pf_prof on usuarios_id = pf_prof.pf_usuarios_id
                LEFT JOIN solicitacao on solicitacao_id = solicitacaoServico_solicitacao_id

                WHERE pj_prof.pj_tipo = 'Profissional' or pf_prof.pf_tipo = 'Profissional'  AND solicitacao_data >= DATE_SUB(NOW(), INTERVAL 1 MONTH)
                GROUP by usuarios_id
                ORDER BY total DESC
                LIMIT 5";
    }


    // Listar cliente pessoa fisica na tela de adm - clientes - pessoa fisica
    private function listasClientes()
    {
        return " SELECT
                *,
                CONCAT(pf_cliente.pf_nome, ' ', pf_cliente.pf_sobrenome
            ) AS nome,
            pf_cliente.pf_cpf AS documento,
            pf_cliente.pf_genero as genero
        FROM usuarios
        LEFT JOIN pessoaFisica pf_cliente
            ON usuarios_id = pf_cliente.pf_usuarios_id
        WHERE pf_cliente.pf_tipo = 'Cliente'
        ORDER BY nome ASC";
    }

    //  Listar clientes pessoa juridica na tela de adm - clientes - pessoa Jurdica
     private function listasClientesPJ()
    {
        return " SELECT
                *,
            pj_cliente.pj_razaoSocial AS nome,
            pj_cliente.pj_cnpj AS documento
        FROM usuarios
        LEFT JOIN pessoaJuridica pj_cliente
            ON usuarios_id = pj_cliente.pj_usuarios_id
        WHERE pj_cliente.pj_tipo = 'Cliente'
        ORDER BY nome ASC";
    }
}
