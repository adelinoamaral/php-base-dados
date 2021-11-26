<?php
session_start();
include_once("../seguranca.php");
include_once("../conexao.php");
$id 				= $_GET["id"];

$query = "DELETE FROM categorias WHERE id=$id";
$resultado = mysql_query($query);
$linhas = mysql_affected_rows();

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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=7'>
				<script type=\"text/javascript\">
					alert(\"Categoria de produto apagado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=7'>
				<script type=\"text/javascript\">
					alert(\"Categoria de produto não foi apagado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>