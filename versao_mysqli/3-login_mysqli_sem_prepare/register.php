<?php
require_once 'config.php';
 
// Inicialização das variáveis do formulário
$username = $password = $confirm_password = "";

// inicialização das mensagens de erro
$username_err = $password_err = $confirm_password_err = "";
 
// Processamento do formulários se submetido
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //
    // valida a introdução do username
    //
    if(empty(trim($_POST["username"]))){
        // username não inserido
        $username_err = "Insira o nome de utilizador.";
    } else{
        // username introduzido vindo do formulário
        $username = trim($_POST["username"]);

        // Verifica se o username existe na tabela. Não será permitido a duplicação de usernames
        $sql = "SELECT id FROM users WHERE username = '$username'";
        if($resultado = $con->query($sql))
        {
            if($resultados->num_rows == 1)
            {
                // username já existe
                $username_err = "O nome de utilizador já existe.";
            }
        } else {
            // A execução da query falhou
            echo "Opps. Algo correu mal";
        }
    }
    

    //
    // valida a introdução da password
    //
    if(empty(trim($_POST['password'])))
    {
        // não inseriu a password
        $password_err = "Insira a senha.";     

        // testa o limite inferior da password
    } elseif(strlen(trim($_POST['password'])) < 6)
    {
        // mensagem de erro do comprimento mínimo
        $password_err = "A senha tem que ter pelo menos 6 caracteres.";
    } else{
        // password vinda do formulário
        $password = trim($_POST['password']);
    }
    

    //
    // valida a introdução da confirmação da password
    //
    if(empty(trim($_POST["confirm_password"])))
    {
        // não inseriu a confirmação da password
        $confirm_password_err = 'Confirma a senha.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        // verifica se as passwords são iguais/diferentes
        if($password != $confirm_password)
        {
            $confirm_password_err = 'As senhas não são iguais.';
        }
        else {
            // encriptação da password para podermos, mais tarde, inserir na BD
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        }
    }
    

    // Verificar a existência de erros antes de inserir os dados na tabela
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
    {
        // Guarda a password encriptada
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$param_password')";
        if($con->query($sql))
        {
            // o método affected_rows guarda o número de linhas afetadas
            if($con->affected_rows == 1)
            {
                // Depois de fazer o registo pede-se a validação da conta
                header("location: login.php");
                exit;
            }
            else {
                echo "Opss. A conta não foi registada na base de dados.";
            }
        }
        else {
            echo "Opss. Algo aconteceu. Tente mais tarde.";
        }
    }
    // fecha a ligação ao servidor de base de dados
    $con->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
        crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 450px; padding: 20px; }
    </style>
</head>
<body>
    <div class="container wrapper">
        <h2>Criar Conta</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nome do utilizador:<sup>*</sup></label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <small class="form-text text-muted"><?php echo $username_err; ?></small>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Senha:<sup>*</sup></label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <small class="form-text text-muted"><?php echo $password_err; ?></small>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirma a Senha:<sup>*</sup></label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <small class="form-text text-muted"><?php echo $confirm_password_err; ?></small>
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