<?php
    require_once "config.php";
   
    try{
        $sql = "INSERT INTO persons (first_name, last_name, email) 
                VALUES ('Diogo', 'Gomes', 'dg@mail.com')";    
        $link->exec($sql);
        echo "Dados inseridos com sucesso.";
    } catch(PDOException $e){
        die("ERRO: Não foi possível executar o comando. " . $e->getMessage());
    }

    unset($pdo);
?>