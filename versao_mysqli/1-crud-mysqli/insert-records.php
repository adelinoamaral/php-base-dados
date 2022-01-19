<?php
    /*
        Ficheiro 4
        Insere registos na tabela persons
        Date: 2017-11-16
        Update: 2018-11-26
    */

    require_once("config.php");
 
    // Comando que permite a inserção de UM registo na tabela
    //$sql = "INSERT INTO persons (id, first_name, last_name, email) VALUES (NULL, 'Peter', 'Parker', 'peterparker@mail.com')";

    // INSERÇÃO DE MULTIPLOS REGISTOS
    $sql = "INSERT INTO persons(first_name, last_name, email) VALUES ('John', 'Rambo', 'johnrambo@mail.com'),
                        ('Clark', 'Kent', 'clarkkent@mail.com'), 
                        ('John', 'Carter', 'johncarter@mail.com'), 
                        ('Harry', 'Potter', 'harrypotter@mail.com')";

    if($mysqli->query($sql) === true){
        
        echo "Registo(s) inserido(s) com  sucesso.";
    } else{
        
        echo "ERROR: erro na execução do comando $sql. " . $mysqli->error;
    }
    
    // Close connection
    $mysqli->close();
?>