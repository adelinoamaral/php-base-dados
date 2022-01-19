<?php
session_start();
include_once("../seguranca.php");
include_once("../ligacao.php");

$nome 				= $_POST["nome"];
$slug 				= $_POST["slug"];
$tag 				= $_POST["tag"];
$description 		= $_POST["description"];

$sql = "INSERT INTO categorias (nome, slug, tag, description, created) VALUES ('$nome', '$slug', '$tag', '$description', NOW())";
$query = mysqli_query($ligaDB, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if (mysqli_affected_rows($ligaDB) != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site1/admin/administrativo.php?link=7'>
				<script type=\"text/javascript\">
					alert(\"Categoria do Produto Registado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site1/admin/administrativo.php?link=7'>
				<script type=\"text/javascript\">
					alert(\"Categoria do produto não foi registada com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>