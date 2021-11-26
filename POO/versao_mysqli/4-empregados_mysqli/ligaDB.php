<?php
    /**
     * Data: 29-10-2017
     * Ficheiro de configuração, cria e seleciona a base de dados 
	*/

	/* 
        Definição das constantes para acesso à base de dados. Pretende-se que estas informações não
        sejam alteradas por qualquer script deste site.
    */
    define('DB_USER', 'gestao');		// nome do utilizador com acesso à base de dados
    define('DB_PASSWORD', '123456');	// password de acesso à base de dados		
    define('DB_HOST', 'localhost');		// nome do servidor
    define('DB_NAME', 'sitename');		// nome da base de dados

	// Ligação ao servidor MySQL
    $con =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if($con->connect_errno){
		echo "Falhou a conexão com a base de dados: " . $dbc->connect_errno;
	}

	$con->set_charset("utf8"); // define a tabela que aceita os caracteres portugueses

?>
