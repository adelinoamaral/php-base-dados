<?php

/**
 * PHP MySQL Create Table Demo
 */
class CreateTableDemo {

    /**
     * database host
     */
    const DB_HOST = 'localhost';

    /**
     * database name
     */
    const DB_NAME = 'demo';

    /**
     * database user
     */
    const DB_USER = 'adelino';
    /*
     * database password
     */
    const DB_PASSWORD = '123456';

    /**
     *
     * @var type 
     */
    private $con = null;

    /**
     * Abre a conexão com a base de dados
     */
    public function __construct() {
        // string de conexão com a base de dados
        $conStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
        try {
            $this->con = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Fecha a conexão com a base de dados
     */
    public function __destruct() {
        $this->con = null;
    }

    /**
     * cria a tabela tasks
     * @return boolean returns true on success or false on failure
     */
    public function createTaskTable() {
        $sql = <<<EOSQL
            CREATE TABLE IF NOT EXISTS tasks (
                task_id     INT AUTO_INCREMENT PRIMARY KEY,
                subject     VARCHAR (255)        DEFAULT NULL,
                start_date  DATE                 DEFAULT NULL,
                end_date    DATE                 DEFAULT NULL,
                description VARCHAR (400)        DEFAULT NULL
            );
        EOSQL;
        return $this->con->exec($sql);
    }

}

// create tasks table
$obj = new CreateTableDemo();
$obj->createTaskTable();