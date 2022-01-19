<?php
    /*
        Ficheiro 11
        Date: 2018-11-27
    */


    require_once("config.php");
    
    $sql = "INSERT INTO persons (first_name, last_name, email) VALUES (?, ?, ?)";
    
    if($stmt = $mysqli->prepare($sql))
    {    
        $stmt->bind_param("sss", $first_name, $last_name, $email);
        
        /* 
            Set parameters
            Neste caso não é necessária a função mysqli_real_escape_string()
            porque as entradas do utilizador não são ineridas diretamente.
        */
        $first_name = $_POST['first_name'];
        $last_name  = $_POST['last_name'];
        $email      = $_POST['email'];
        
        // Tenta executar a sentença SQL
        if($stmt->execute()){
            
            echo "Os registos forma inseridos com sucesso";
        } else{
            
            echo "ERROR: Não foi possível executar a query: $sql. " . $mysqli->error;
        }
    } else{
        echo "ERROR: Não foi possível preparar a query: $sql. " . $mysqli->error;
    }
    
    // Close statement
    $stmt->close();
    
    // Close connection
    $mysqli->close();
?>