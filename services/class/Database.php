<?php

class Database
{
    //Propriétés de notre class
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_port;

    //propriétés DSN
    private $db_dsn;

    //PDO
    private $pdo;

    public function __construct(
        $db_host = 'localhost',
        $db_name = 'my_mvc_bdd2',
        $db_port = '3306',
        $db_user = 'root',
        $db_pass = ''
    ) {
        $this->db_host = $db_host;
        $this->db_port = $db_port;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;

        $this->db_dsn = 'mysql:host=' . $this->db_host . ';port=' . $this->db_port . ';dbname=' . $this->db_name . ';charset=utf8';
    }

    private function getPDO()
    {
        if ($this->pdo === null) {
            try {
                $db = new PDO($this->db_dsn, $this->db_user, $this->db_pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Oups PDO l'est pas content" . $e->getMessage();
                die();
            }
            $this->pdo = $db;
        }

        //Tout est ok pour avoir nombre objet PDO
        return $this->pdo;
    }

    public function selectAll($statement,$params=[]){
        $stmt = $this->getPDO()->prepare($statement);
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectOne($statement,$params=[]){
        $stmt = $this->getPDO()->prepare($statement);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
