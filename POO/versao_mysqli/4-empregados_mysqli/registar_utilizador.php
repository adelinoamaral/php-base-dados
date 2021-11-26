    
    <?php
       
        // Verifica se o formulário foi enviado:
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // ligação ao servidor/base de dados MySQL
            require_once ('ligaDB.php');
            
            $nome       = $con->real_escape_string(trim($_POST['nome']));
            $apelido    = $con->real_escape_string(trim($_POST['apelido']));
            $email      = $con->real_escape_string(trim($_POST['email']));
            
            if ($_POST['pass1'] != $_POST['pass2']) {
                    // Fecha aligação à base de dados
                    $con->close();
                    header('location:cria_utilizador.php?erro=As senhas não são iguais');
            } else {
                
                    $p = $con->real_escape_string(trim($_POST['pass1']));
            }
            
            
            // A função mysqli_real_escape_string evita problemas de SQL Injection.
            // A função SHA1() calcula a hash sha1 de uma string (codifica).
            $sql = "INSERT INTO utilizadores (user_nome, user_apelido, user_email, user_senha, user_dataregisto) ";
            $sql .= "VALUES ('$nome', '$apelido', '$email', SHA1('$p'), NOW() )";

            // executa a instrução SQL
            $result = $con->query ($sql);
            
            /*
                $con->affected_row = retorna o número de linhas afetadas pela última consulta 
                INSERT, UPDATE, REPLACE ou DELETE associada ao parâmetro $con indicado
            */
            
            if ($result) { // Query executada com sucesso
                
                // Fecha aligação à base de dados
                $con->close();
                
                header('location: index.php?erro=Utilizador guardado com sucesso');

            } else { // Ocorreram erros na execução da query

                // Fecha aligação à base de dados
                $con->close();
                header('location:registar_utilizador.php?erro=O utilizador não foi registado');
            }

        }
          
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registar Utilizador</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php
                if(isset($erro)){
                    echo '<div class="alert alert-warning" role="alert">';
                    echo "<strong>" . $erro . "</strong>"; 
                }
                ?>
                <h3>Informações do utilizador</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group">
                        <label for="InputNome">Nome</label>
                        <input type="text" class="form-control" id="InputNome" placeholder="Nome" name="nome" size="15" maxlength="20" value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="InputApelido">Apelido</label>
                        <input type="text" class="form-control" id="InputApelido" placeholder="Apelido" name="apelido" size="15" maxlength="40" value="<?php if(isset($_POST['apelido'])) echo $_POST['apelido']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Email</label>
                        <input type="email" class="form-control" id="InputEmail" placeholder="Email" name="email" size="20" maxlength="80" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="InputPassword">Senha</label>
                        <input type="password" class="form-control" id="InputPassword" placeholder="Senha" name="pass1" size="10" maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="InputPasswordR">Repetir senha</label>
                        <input type="password" class="form-control" id="InputPasswordR" placeholder="Repetir Senha" name="pass2" size="10" maxlength="20">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
                    <a class="btn btn-default" href="index.php" role="button">Voltar</a>
                </form>
            </div>
        </div>
   
    <?php include "includes/footer.php"; ?>