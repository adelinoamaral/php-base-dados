<?php

    /*
        Ficheiro 8
         Date: 2017-11-16
    */

    require_once("config.php");
    
    $sql = "DELETE FROM persons WHERE id=4";

    if($mysqli->query($sql) === true){
        
        echo "O registo foi apagado com sucesso.";
    } else{
        
        echo "ERROR: erro na execução do comando $sql. " . $mysqli->error;
    }
    
    // Close connection
    $mysqli->close();
?>