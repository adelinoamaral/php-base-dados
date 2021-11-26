<?php

require_once 'config.php';
 
// Inicializa as variáveis
$username = $password = "";
$username_err = $password_err = "";
 
// Processamento do formulário se submetido
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check se username está vazio
    if(empty(trim($_POST["username"]))){
        $username_err = 'Insira o nome de utilizador.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST['password']))){
        $password_err = 'Insira a senha.';
    } else{
        $password = trim($_POST['password']);
    }
    
    if(empty($username_err) && empty($password_err)){

        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){

                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){ 

                    // Bind result variables
                    $stmt->bind_result($username, $hashed_password);

                    if($stmt->fetch()){

                        if(password_verify($password, $hashed_password)){

                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: welcome.php");

                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'A senha inserida não é válida.';
                        }

                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'Não encontrou a conta.';
                }
            } else{
                echo "Oops! Algo de errado aconteceu, tente mais tarde.";
            }
        }
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Insira .</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nome de utilizador:<sup>*</sup></label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Senha:<sup>*</sup></label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
            </div>
            <p>Não tem conta? <a href="register.php">Registe-se agora</a>.</p>
        </form>
    </div>    
</body>
</html>