<?php
    
    try{
        $link = new PDO("mysql:host=localhost;", "root", "");
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERRO: Falha na ligação ao servidor. " . $e->getMessage());
    }
    
    try{
        $sql = "CREATE DATABASE demo";
        $link->exec($sql);
        echo "A base de dados foi criada com sucesso";
    } catch(PDOException $e){
        die("ERRO: ocorreu um erro na execução do comando $sql. " . $e->getMessage());
    }
     
    // Fecha a ligação ao servidor
    unset($link);
?>
