<?php
    /**
     * Ficheiro 2
     * Cria a base de dados republic
     * Date: 2017-11-16
     * Update: 2018-11-26
     */
        

    // Estabelece as definições ao servidor MySQL
    require_once("config.php"); 

    // Cria a base de dados ou verifica se já existe
    $sql = "CREATE DATABASE IF NOT EXISTS republic";

    /* 
        O método query executa um comando SQL. Devolve FALSE se a operação falhou,
        se obtiver sucesso poderá ser TRUE ou um conjunto de resultados 
    */
    if($mysqli->query($sql) === true){
        
        echo "A base de dados foi ciada com sucesso";

    } else{
        // $mysqli->error devolve a descrição do último erro de um objeto mysqli
        echo "ERROR: Não executou o comando $sql. " . $mysqli->error;
    }
    
    // Fecha a ligação ao servidor
    $mysqli->close();
?>