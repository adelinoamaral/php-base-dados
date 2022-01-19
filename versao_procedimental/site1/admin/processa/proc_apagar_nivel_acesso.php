<?php
session_start();
include_once("../seguranca.php");
include_once("../ligacao.php");

$id = $_GET["id"];

$sql = "DELETE FROM nivel_acessos WHERE idnivel_acesso=$id";
$resultado = mysqli_query($ligaDB, $sql);
//$linhas = mysqli_affected_rows($ligaDB);

?>
<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if (mysqli_affected_rows($resultados) != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site1/admin/administrativo.php?link=18'>
				<script type=\"text/javascript\">
					alert(\"Nivel de Acesso apagado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site1/admin/administrativo.php?link=18'>
				<script type=\"text/javascript\">
					alert(\"Nivel de Acesso não foi apagado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>