<?php
    require_once "config.php";
    
    try{
        
        $sql = "INSERT INTO persons (first_name, last_name, email) 
                VALUES (:first_name, :last_name, :email)";
        // Prepara o comando SQL
        $stmt = $link->prepare($sql);
        
        // Ligação dos parâmetros aos campos da tabela
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $first_name = $_POST['first_name'];
        $last_name  = $_POST['last_name'];
        $email      = $_POST['email'];
        
        $stmt->execute();
        
        // obtém o id do registo inserido
        $last_id = $link->lastInsertId();
        echo "Registo $last_id foi inserido com sucesso.";
    } catch(PDOException $e){
        die("ERRO: Não foi possível executar o comando. " . $e->getMessage());
    }
    unset($stmt);
    unset($link);