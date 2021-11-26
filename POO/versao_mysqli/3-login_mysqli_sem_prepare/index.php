<?php
session_start();

// verifica se foi iniciada a sessão
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
        crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>

    <div class="page-header">
        <h1>Olá, <b><?php echo $_SESSION['username']; ?></b>. Chegaste ao Site.</h1>
    </div>
    <p><a href="logout.php" class="btn btn-danger">Sair da conta</a></p>
</body>
</html>