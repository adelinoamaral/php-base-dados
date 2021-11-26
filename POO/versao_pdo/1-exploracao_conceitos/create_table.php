<?php
    require_once "config.php";
   
    try{
        $sql = "CREATE TABLE persons(
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            first_name VARCHAR(30) NOT NULL,
            last_name VARCHAR(30) NOT NULL,
            email VARCHAR(70) NOT NULL UNIQUE
        )";    
        $link->exec($sql);
        echo "Tabela criada com sucesso.";
    } catch(PDOException $e){
        die("ERRO: Não foi possível executar o comando. " . $e->getMessage());
    }
    
    // Close connection
    unset($link);
?>