<?php
session_start();


if(!isset($_SESSION['username']) || empty($_SESSION['username']))
{
    // o login ainda não foi feito com sucesso
  header("location: login.php");
  exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Olá, <b><?php echo $_SESSION['username']; ?></b>. Chegaste ao Melhor Site.</h1>
    </div>
    <p><a href="logout.php" class="btn btn-danger">Sair da conta</a></p>
</body>
</html>