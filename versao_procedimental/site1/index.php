<?php
	define("PH", "http://localhost/modulo_5/site1")
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Loja Virtual</title>
	<link rel="shortcut icon" href="">
	<link rel="stylesheet" href="<?php echo PH ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo PH ?>/css/jumbotron.css">
	
	<!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
	
	
	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo PH ?>/js/ie-emulation-modes-warning.js"></script>

	<!--[if IE]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
</head>

<body>

	<!-- Menu -->
	<?php
		include_once("menu.php");
	?>
		
	
	<?php
	
		$url = (isset($_GET['url'])) ? $_GET['url']:'';
	
		$explode = explode('/',$url);
		
		$paginas = array('home','produto','contacto','empresa','detalhe_produto','proc_cad_contato');
		
		if(isset($explode[0])&& $explode[0] == ''){
			include "home.php";
		}elseif($explode[0]!=''){
			if(isset($explode[0]) && in_array($explode[0],$paginas)){
				include $explode[0].".php";
			}else{
				include "home.php";
			}
		}
	
	?> 
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo PH ?>/js/jquery.js"></script>
	<script src="<?php echo PH ?>/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo PH ?>/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
