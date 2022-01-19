<?php

    if(isset($_POST['user'])) $user  = $_POST['user'];
    if(isset($_POST['senha'])) $senha  = $_POST['senha'];

    require_once "../ligaDB.php";

    $sql = "SELECT user_id, user_nome 
            FROM utilizadores 
            WHERE user_nome='$user' AND user_senha=SHA1('$senha')";

    $result = $con->query ($sql);
		
    if($con->errno) die($dbc->error);
  
    if ($result->num_rows == 1) {
        // utilizador está registado

        // Extrai o registo 
        $registo = $result->fetch_assoc ();     //$registo = $result->fetch_array ();

        session_start();
        $_SESSION['loggedin']   = true; // indica que fez login
        $_SESSION['username'] 	= $user;
        $_SESSION['user_id']    = $registo['user_id'];

        $con->close();
        unset($registo);    // elimina a variável que contém os registos
        header("location:../dashboard.php?PHPSESSID=" . session_id());

    } else {
            header("Location: ../?erro='O email e a senha não existem na base de dados.'");
    }
        
?>




                            