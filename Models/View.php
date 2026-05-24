<?php

namespace Models;

use \Pdo;
use \PDOException;
use \Utils\RenderView;
use Database as Database;
use Models\Database as ModelsDatabase;

class View extends ModelsDatabase
{

    public function __construct($table)
    {
        parent::__construct($table);
    }   

    public function listarTodos() {

        $sql = "SELECT * FROM vw_profissionais";

        return $this->execute($sql)->fetchAll(PDO::FETCH_OBJ);

    }

    public function listarPorId($id) {

        $sql = "SELECT * FROM vw_profissionais WHERE usuarios_id = :id";

        $params = ['id' => $id];

        return $this->execute($sql, $params)->fetch(PDO::FETCH_OBJ);

    }
    

    
    
}   