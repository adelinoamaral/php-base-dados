<?php
session_start();
include_once("../seguranca.php");
include_once("../ligacao.php");

$id 			= $_POST["id"];
$nome 			= $_POST["nome"];
$slug 			= $_POST["slug"];
$tag 			= $_POST["tag"];
$description 	= $_POST["description"];

$sql = "UPDATE categorias set nome ='$nome', slug = '$slug', tag='$tag', description= '$description', modified = NOW() WHERE idcategoria='$id'";
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
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site1/admin/administrativo.php?link=7'>
				<script type=\"text/javascript\">
					alert(\"Categoria editada com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site1/admin/administrativo.php?link=7'>
				<script type=\"text/javascript\">
					alert(\"Categoria não foi editado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>