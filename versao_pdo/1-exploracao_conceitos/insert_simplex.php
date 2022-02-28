<?php
    require_once "config.php";

    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email      = $_POST['email'];

    $data = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
      ];  
    
    /* experimentar 
    $data = [
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':email' => $email,
    ]; */
    
    try{
        $sql = "INSERT INTO persons (first_name, last_name, email) 
                VALUES (:first_name, :last_name, :email)";
        $stmt = $link->prepare($sql);
        $stmt->execute($data);
        
        $last_id = $link->lastInsertId();
        echo "Registo $last_id foi inserido com sucesso.";
    } catch(PDOException $e){
        die("ERRO: Não foi possível executar o comando. " . $e->getMessage());
    }
    unset($stmt);
    unset($link);