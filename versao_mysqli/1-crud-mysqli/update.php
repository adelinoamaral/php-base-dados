<?php
    /*
        Ficheiro 7
        Date: 2017-11-16
    */

    require_once("config.php");
    
    $sql = "UPDATE persons SET email='fafa@sapo.pt' WHERE id=1";
    $result = $mysqli->query($sql);

    if( $result === true){
        
        echo "Operação com sucesso, foi atualizado " . $mysqli->affected_rows . " registo.";
        
    } else{
        
        echo "ERROR: erro na execução do comando $sql. " . $mysqli->error;
    }
    
    // Close connection
    $mysqli->close();
?>