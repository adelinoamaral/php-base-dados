<?php
require_once 'config.php';
 
// Inicialização das variáveis
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processamento do formulários se submetido
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Insira o nome de utilizador.";
    } else{
        // username vindo do formulário
        $username = trim($_POST["username"]);

        // Verifica se o nome de utilizador existe na tabela
        $sql = "SELECT id FROM users WHERE username = '$username'";
        if($resultado = $mysqli->query($sql))
        {
            if($resultados->num_rows == 1)
            {
                $username_err = "O nome de utilizador já existe.";
            }
        } else {
            echo "Opps. Algo correu mal";
        }
    }
    
    if(empty(trim($_POST['password'])))
    {
        $password_err = "Insira a senha.";     
    } elseif(strlen(trim($_POST['password'])) < 6)
    {
        $password_err = "A senha tem que ter pelo menos 6 caracteres.";
    } else{
        // password vinda do formulário
        $password = trim($_POST['password']);
    }
    

    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = 'Confirma a senha.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password)
        {
            $confirm_password_err = 'As senhas não são iguais.';
        }
        else {
            // as senhas coincidem, então podemos encriptar a senha
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        }
    }
    
    // Verificar a existência de erros antes de inserir os dados na tabela
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
    {
        // Guarda a password encriptada
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$param_password')";
        if($mysqli->query($sql))
        {
            if($mysqli->affected_rows == 1)
            {
                // Depois de fazer o registo pede-se a validação da conta
                header("location: login.php");
            }
            else {
                echo "Opss. Algo aconteceu. Tente mais tarde.";
            }
        }
    }
    
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="container wrapper">
        <h2>Criar Conta</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nome do utilizador:<sup>*</sup></label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Senha:<sup>*</sup></label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirma a Senha:<sup>*</sup></label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Criar">
                <input type="reset" class="btn btn-default" value="Limpar">
            </div>
            <p>Já tem conta? <a href="login.php">Entre no sistema</a>.</p>
        </form>
    </div>    
</body>
</html>