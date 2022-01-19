<?php
session_start();
include_once("../seguranca.php");
include_once("../ligacao.php");

$id = $_POST["id"];
$nome_nivel = $_POST["nome_nivel"];

$sql = "UPDATE nivel_acessos set nome_nivel ='$nome_nivel', modified = NOW() WHERE idnivel_acesso='$id'";
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site1/admin/administrativo.php?link=18'>
				<script type=\"text/javascript\">
					alert(\"Nivel de acesso editado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/site1/admin/administrativo.php?link=18'>
				<script type=\"text/javascript\">
					alert(\"Nivel de acesso não foi editado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>