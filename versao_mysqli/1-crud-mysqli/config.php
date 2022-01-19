<?php
/* 
    :: Ficheiro 1
    Author: Adelino Amaral
    Date: 2017-11-16
    Update: 2018-11-26
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'republic');

// Inicialização do construtor se a base de dados não existir
//$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD);

// Inicialização do construtor se a base de dados existir
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Não estabeleceu ligação ao servidor. " . $mysqli->connect_error);
}

// Print host information
// echo "Ligação ao servidor: sucesso. Informação do Host: " . $mysqli->host_info;

$mysqli->set_charset("utf8"); // define a tabela que aceita os caracteres portugueses

// Close connection
// $mysqli->close();
?>