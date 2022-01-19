<?php
	$SERVERNAME = "localhost";
	$USERNAME = "adelino";
	$USERPASSWORD = "12345";

	// ligação ao servidor
	$ligaDB = mysqli_connect($SERVERNAME,$USERNAME, $USERPASSWORD) or die ("Erro na ligação");
	// selecionar a base de dados db_mod5
	$escolheBD = mysqli_select_db($ligaDB, "db_mod5") or die ("Base de dados não foi encontrada");

	if (!$ligaDB) {
		printf("Não pode ligar-se ao localhost. Erro: %s\n", mysqli_connect_error());
		exit();
	}
?>