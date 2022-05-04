<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'adelino';
    $DATABASE_PASS = '123456';
    $DATABASE_NAME = 'demo';
    try {
    	return new PDO(
			'mysql:host=' . $DATABASE_HOST . 
			';dbname=' . $DATABASE_NAME . 
			';charset=utf8', 
			$DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Falhou a conexão à base de dados!');
    }
}


function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
EOT;
}


function template_footer() {
echo <<<EOT
	<script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>
EOT;
}

function table_header(){
	echo <<<EOT
	<table class="table">
  	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nome</th>
			<th scope="col">Email</th>
		</tr>
  	</thead>
	<tbody>
EOT;
}

function table_footer(){
	echo <<<EOT
	</tbody>
	</table>
EOT;
}


?>