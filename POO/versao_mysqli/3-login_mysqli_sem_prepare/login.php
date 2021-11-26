<?php

require_once 'config.php';
 
// Inicializa as variáveis do formulário
$username = $password = "";
// Inicializa as variáveis de erro
$username_err = $password_err = "";
 
// Processamento do formulário se submetido
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check se username está vazio
    if(empty(trim($_POST["username"]))){
        $username_err = 'Insira o nome de utilizador.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // verifica se a password está vazia
    if(empty(trim($_POST['password']))){
        $password_err = 'Insira a senha.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // se não houver erros (as variáveis de erro estiverem vazias significa que não houve erros)
    if(empty($username_err) && empty($password_err))
    {

        /*
            Vamos ver se o username existe na tabela, o comando sql também devolve a password
            encriptada.
        */
        $sql = "SELECT username, password FROM users WHERE username = '$username'";
        if($resultado = $con->query($sql))
        {
            if($resultado->num_rows == 1)
            {
                if($reg = $resultado->fetch_array())
                {
                    // $hashed_password - password encriptada que vem da base de dados (tabela users)
                    $hashed_password = $reg['password'];
                    
                    /*
                        A função password_verify() vai verificar se a senha do formulário (não encriptada)
                        é igual à senha encriptada da tabela.

                        $password - vem do formulário
                    */
                    if(password_verify($password, $hashed_password)){

                        /* A password está correta, vamos iniciar a sessão com o nome do username */
                        session_start();
                        $_SESSION['username'] = $username;      
                        header("location: index.php");
                        exit;
                    } else{
                        // Mensagem se a password for inválida
                        $password_err = 'A senha inserida não é válida.';
                    }
                }
            } else {
                $username_err = 'O nome de utilizador não está registado.';
            }
        }
    }
    
    $con->close();
}
?>
 
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
        crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 450px; padding: 20px;}
    </style>
</head>
<body>
    <div class="container wrapper">
        <h2>Entrada no Sistema</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nome de utilizador:<sup>*</sup></label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <small class="form-text text-muted"><?php echo $username_err; ?></small>
            </div> 

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Senha:<sup>*</sup></label>
                <input type="password" name="password" class="form-control">
                <small class="form-text text-muted"><?php echo $password_err; ?></small>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
            </div>
            <p>Não tem conta? <a href="register.php">Registe-se agora</a>.</p>
        </form>
    </div>    
</body>
</html>