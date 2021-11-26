<?php
	// definem-se constante para que não haja alterações
    define("db_host", "localhost");
    define("db_name", "registration");
	define("db_user", "root");
	define("db_pass", "");

	//$mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $mysqli = mysqli_connect(db_host, db_user, db_pass, db_name);
    if($mysqli === false){
        die("ERRO: Não estabeleceu a conexão. " . mysqli_connect_error());
    }

    // echo "Connect Successfully. Host info: " . mysqli_get_host_info($mysqli);
?>