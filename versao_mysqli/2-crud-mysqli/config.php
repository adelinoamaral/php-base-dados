<?php
// definições da ligação ao servidor e nome da base de dados
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'company');

/**
 * Execute o script employees.sql que permite criar a base de dados, a tabela 
 * e alguns dados na tabela.
 * 
 * Nome da base de dados: company
 * Nome da tabela: employees
 */
 
// Ligação ao servidor e à base de dados no MySQL
$con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

// Verifica o estado da ligação
if($con === false){
    die("ERROR: Falha na ligação ao servidor. " . $con->connect_error);
}

$con->set_charset("utf8");
?>