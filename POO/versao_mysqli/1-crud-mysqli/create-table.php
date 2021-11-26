<?php
    /**
     *  Ficheiro 3
     * 
     */

    // Estabelece as definições ao servidor MySQL
    require_once("config.php");
    
    // Comando que cria a tabela persons ou verifica se a tabela já existe    
    $sql = "CREATE TABLE IF NOT EXISTS persons(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        email VARCHAR(70) NOT NULL UNIQUE
    )";   


    // O método query executa um comando SQL
    if($mysqli->query($sql) === true){
        
        echo "Tabela cria com sucesso.";
    } else{
        // $mysqli->error devolve a descrição do último erro de um objeto mysqli
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
 
    // Close connection
    $mysqli->close();
?>