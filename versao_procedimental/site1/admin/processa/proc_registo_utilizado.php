<?php
	session_start();	//???????
	include_once("../seguranca.php");
	include_once("../ligacao.php");

	$nome 				= $_POST["nome"];
	$email 				= $_POST["email"];
	$utilizador 		= $_POST["utilizador"];
	$senha 				= $_POST["senha"];
	$nivel_de_acesso 	= $_POST["nivel_de_acesso"];

	$sql =  "INSERT INTO utilizadores (nome, email, login, senha, nivel_acesso_id, created) ";
	$sql .= "VALUES ('$nome', '$email', '$utilizador', '$senha', '$nivel_de_acesso', NOW())";
	$query = mysqli_query($ligaDB, $sql);
	?>
	
	<!DOCTYPE html>
	<html lang="pt-pt">
	  <head>
		<meta charset="utf-8">
		</head>

		<body>
			<?php
				if (mysqli_affected_rows($ligaDB) != 0 ){	
					/*
						reformular este aspecto.
					*/
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/modulo_5/site1/admin/administrativo.php?link=2'>
						<script type=\"text/javascript\">
							alert(\"Utilizador Registado com Sucesso.\");
						</script>
					";		
					
				}
				 else{ 	
						echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/modulo_5/site1/admin/administrativo.php?link=2'>
						<script type=\"text/javascript\">
							alert(\"Utilizador não foi registado com Sucesso.\");
						</script>
					";		   

				}

			?>
	</body>
</html>