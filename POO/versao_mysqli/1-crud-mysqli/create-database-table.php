<?php
    require_once("config.php"); 
    $sql = "CREATE DATABASE IF NOT EXISTS republic";
    if($mysqli->query($sql) === false){
        echo "ERROR: Não executou o comando $sql. " . $mysqli->error;
    }

    $mysqli->select_db(DB_NAME);

    $sql = "CREATE TABLE IF NOT EXISTS persons(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        email VARCHAR(70) NOT NULL UNIQUE
    )";       
    if($mysqli->query($sql) === false){
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
    $mysqli->close();
?>