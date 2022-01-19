<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>
	
	<?php

include_once("../adm/conexao.php");
$nome 				= $_POST["nome"];
$email			 	= $_POST["email"];
$telefone		 	= $_POST["telefone"];
$assunto			= $_POST["assunto"];
$mensagem			= $_POST["mensagem"];

$query = mysql_query("INSERT INTO contatos (nome, email, telefone, assunto, mensagem, created) VALUES ('$nome', '$email', '$telefone', '$assunto', '$mensagem', NOW())");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if (mysql_affected_rows() != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/contato'>
				<script type=\"text/javascript\">
					alert(\"Mensagem enviada com Sucesso.\");
				</script>
			";	 
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/contato'>
				<script type=\"text/javascript\">
					alert(\"Mensagem não foi enviada com Sucesso.\");
				</script>
			";		

		}

		?>
	</body>
</html>