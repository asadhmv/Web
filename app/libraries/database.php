<?php

require_once('/var/www/html/TP/app/config/config.php');

class Database{
    protected $_connexion;
    private $statement;
    
    public function __construct(){
        $this->getConnection();
    }

    public function getConnection(){
        $this->_connexion=null;
        try{
            $this->_connexion=new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
        }
        catch(PDOException $exception){
            echo "PDO : ".$exception->getMessage();
        }
    }

    public function prepare($sql){
        $this->statement = $this->_connexion->prepare($sql);
        return $this->statement;
    }

    public function execute(){
        $this->statement->execute();
    }

    public function single(){
        $this->execute();   
        return $this->statement->fetch();
    }

    public function resultSet(){
        $this->execute();
        return $this->statement->fetchAll();
    }

    public function rowCount(){
        $this->execute();
        return $this->statement->rowCount();
    }
}
