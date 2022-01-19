<?php
    /*
        Ficheiro 5 - os dados veem do formulario add-record-form.php
        Date: 2017-11-16
    */

// include config.php file
require_once("config.php");
 
// Escape user inputs for security
$first_name = $mysqli->real_escape_string($_POST['first_name']);
$last_name  = $mysqli->real_escape_string($_POST['last_name']);
$email      = $mysqli->real_escape_string($_POST['email']);
 
// define sql statment
$sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";

// attempt insert query execution
$result = $mysqli->query($sql);

if($result === true)
{
    // Obtém o último id, repare que o idderiva da incrementação automática.
    $ultimo_id = $mysqli->insert_id;

    // $mysqli->affected_rows devolve o número de linhas (registos) afetados pela execução
    // do comando sql.
    echo "Operação com sucesso, foi adicionado " . $mysqli->affected_rows . " registo.<br>";
    echo "O último ID adicionado foi " . $ultimo_id;
    
} else{
    
    echo "ERROR: erro na execução do comando $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>