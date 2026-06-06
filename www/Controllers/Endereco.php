<?php 


namespace Controllers;

use \Models\Database as Conexao;
use \PDO;

use \Utils\RenderView;


class Endereco {

private $endereco;

public function __construct()
{
    $this->endereco = new Conexao('endereco');

}



public function cadastar($values) {

    $this->endereco->insert($values);

}

    
}






?>