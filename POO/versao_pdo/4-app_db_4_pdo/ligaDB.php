<?php
    /*
		Data: 07-11-2016
		Ficheiro de configuração, cria e seleciona a base de dados 
	*/

	/*
		PDO é uma camada de abstração. É um código entre o código PHP e os SGBD
		Permite conectar com diferentes SGBD.
	*/

	// Definição das constantes para acesso à base de dados
    define('DB_USER', 'adelino');		// nome do utilizador com acesso à base de dados
    define('DB_PASSWORD', '123456');		// password de acesso à base de dados		
    define('DB_HOST', 'localhost');		// nome do servidor
    define('DB_NAME', 'sitename');		// nome da base de dados

	try{
		$db = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8"; 
	
		$dbc = new PDO($db, DB_USER, DB_PASSWORD);
		$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	} catch(PDOException $e){
	
		die("ERRO: Não foi possível estabelecer a ligação. " . $e->getMessage());
	}

/*
	// Ligação ao servidor MySQL
	try {
		$dbc = new PDO('mysql:host=localhost; dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
		
		$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$dbc->exec("SET CHARACTER SET utf8");
			
	}catch(Exception $e) {
		die('Erro: ' . $e->GetMessage() );
	}
	finally{
		$dbc=null;
	}
*/
?>