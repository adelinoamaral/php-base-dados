<?php
	ob_start();
	// Evita acesso ilegais porquem não fez login
	if(($_SESSION['userId'] == "") || ($_SESSION['userNome'] == "") || ($_SESSION['userNivelAcesso'] == "") || ($_SESSION['userLogin'] == "") || ($_SESSION['userSenha'] == "")){
		unset($_SESSION['userId'],			
			  $_SESSION['userNome'], 		
			  $_SESSION['userNivelAcesso'], 
			  $_SESSION['userLogin'], 		
			  $_SESSION['userSenha']);

		//Mensagem de Erro
		$_SESSION['loginErro'] = "Área restrita para utilizadores registados";

		//Manda o usuário para a tela de login
		header("Location: index.php");
}