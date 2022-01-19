<?php
	session_start();
	session_destroy();

	//Remove todas as informações contidas na variaveis globais
	unset($_SESSION['userId'],			
			$_SESSION['userNome'], 		
			$_SESSION['userNivelAcesso'], 
			$_SESSION['userLogin'], 		
			$_SESSION['userSenha']);

	//redirecionar o usuário para a página de login
	header("Location: index.php");
?>