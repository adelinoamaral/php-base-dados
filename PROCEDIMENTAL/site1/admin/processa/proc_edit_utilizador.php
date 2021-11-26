<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../ligacao.php");

	$id 				= $_POST["id"];
	$nome 				= $_POST["nome"];
	$email 				= $_POST["email"];
	$utilizador 		= $_POST["utilizador"];
	$senha 				= $_POST["senha"];
	$nivel_de_acesso 	= $_POST["nivel_de_acesso"];

	$sql =  "UPDATE utilizadores set nome ='$nome', email = '$email', login = '$utilizador', senha = '$senha', nivel_acesso_id = '$nivel_de_acesso', modified = NOW() ";
	$sql .= "WHERE idutilizador='$id'";
	$resultados = mysqli_query($ligaDB, $sql);

	//var_dump($id);
	//exit;
?>
<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if (mysqli_affected_rows($ligaDB) != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site1/admin/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Utilizador alterado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site1/admin/administrativo.php?link=2'>
				<script type=\"text/javascript\">
					alert(\"Utilizador não foi alterado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>