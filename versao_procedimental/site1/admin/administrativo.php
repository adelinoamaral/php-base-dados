<?php
	session_start();
	include_once("seguranca.php");
	include_once("ligacao.php");
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página Administrativa">
    <meta name="author" content="Adelino">
    <link rel="icon" href="ico/favicon.ico">
    
    <title>Administração</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/tema.css">
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
	<?php
		include_once("menu_admin.php");

	  if(isset($_GET))
	  	$link = $_GET["link"];
	  else
		  $link = 0;
		

		$pagina[1] = "bem_vindo.php";		// este ficheiro devia ser a dashboard
		$pagina[2] = "listar_utilizadores.php";
		$pagina[3] = "registar_utilizador.php";
		$pagina[4] = "editar_utilizador.php";		
		$pagina[5] = "visual_utilizador.php";
		$pagina[6] = "registar_categoria.php";
		$pagina[7] = "listar_categoria.php";
		$pagina[8] = "visual_categoria.php";
		$pagina[9] = "editar_categoria.php";
		/*$pagina[10] = "listar_produto.php";
		$pagina[11] = "cad_produto.php";
		$pagina[12] = "visual_produto.php";
		$pagina[13] = "editar_produto.php";
		$pagina[14] = "listar_situacao.php";
		$pagina[15] = "cad_situacao.php";
		$pagina[16] = "visual_situacao.php";
		$pagina[17] = "editar_situacao.php"; */
		$pagina[18] = "listar_nivel_acesso.php";
		$pagina[19] = "registar_nivel_acesso.php";
		$pagina[20] = "visual_nivel_acesso.php";
		$pagina[21] = "editar_nivel_acesso.php";
		/*$pagina[22] = "listar_destaque_produto.php";
		$pagina[23] = "cad_destaque_prod.php";
		$pagina[24] = "cad_carousel.php";
		$pagina[25] = "listar_carousel.php";
		$pagina[26] = "listar_mensagem_contato.php"; */

	  
		if(!empty($link)){
			// verifica se o ficheiro existe
			if(file_exists($pagina[$link])){
				include $pagina[$link];	// inclui o ficheiro selecionado nesta posição deste ficheiro
			}else{
				include "bem_vindo.php";
			}
		}else{
			include "bem_vindo.php";
		}

	?>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
	<script src="js/ckeditor/ckeditor.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>