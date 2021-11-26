<?php

    session_start();

    // captura erro vindo de outra página
    if(isset($_GET['erro'])) $erro = $_GET['erro'];

    // verifica se o utilizador fez login
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

        header("location: dashboard.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .marginTop{
            margin-top: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row marginTop">
            <div class="col-md-6 col-md-offset-3">
               <?php
                   if(isset($erro)){
                        echo '<div class="alert alert-warning" role="alert">';
                            echo "<strong>" . $erro . "</strong>"; 
                        echo "</div>";
                    }
               ?>
                <form action="processa/valida.php" method="post">
                    <div class="form-group">
                        <label for="InputUser">Nome utilizador</label>
                        <input type="text" name="user" class="form-control" id="InputUser" placeholder="Nome utilizador" required>
                    </div>
                    <div class="form-group">
                        <label for="InputPassword1">Senha</label>
                        <input type="password" name="senha" class="form-control" id="InputPassword1" placeholder="Senha" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Entrar">
                </form>
            </div>
        </div>
    </div>    
    <script src="js/bootstrap.min.js"></script>
</body>
</html>