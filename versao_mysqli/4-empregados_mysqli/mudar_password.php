<?php #

/*
    Date: 18/08/2015
    Author: Adelino Amaral
    Description: Esta página altera a senha atual associada a um email.
*/

$titulo = 'Altere a sua Senha';
include ('includes/header.php');

// Verifica se o formulário foi enviado:
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviado'])) {

	require_once ('ligaDB.php'); // Connect to the db.
    
    
    $email = $con->real_escape_string(trim($_POST['email']));
    $p = $con->real_escape_string(trim($_POST['pass']));
    
    $id = $_SESSION['user_id'];
	
    if ($_POST['pass1'] != $_POST['pass2']) {
        //$erros[] = 'As senhas não coincidem.';
        
    } else {
        $np = $con->real_escape_string(trim($_POST['pass1']));
    }
	
	
    // verifica se a senha antiga está correta
    $sql = "SELECT user_id FROM utilizadores WHERE (user_id='$id' AND user_senha=SHA1('$p') )";
    $result = $con->query($sql);
    
    if ($result->num_rows == 1) {  // a senha está correta

        $row = $result->fetch_array();

        // atualiza a senha com o novo valor inserido
        $q = "UPDATE utilizadores SET user_senha=SHA1('$np') WHERE user_id=$row[0]";		
        $r = $con->query($q);

        if ($con->affected_rows == 1) { // Se foi afetada/atualizada uma linha

            $frase = "A sua senha foi atualizada.";
            header("location: dashboard.php?erro=$frase");

        } else {

            // Debugging message:
            //echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
            
            $frase = "A senha não foi atualizada, ocorreu um erro no sistema.";
            header("location: dashboard.php?erro=$frase");

        }

        include ('includes/footer.php'); 
        exit();

    } else { // Há problemas com os dados na base de dados, ou os dados não existem ou há email e senha repetidos
       
        $frase = "A senha está incorreta!!.";
        header("location: dashboard.php?erro=$frase");
    }
		
	$con->close(); // fecha a ligação à base de dados.
		
}

?>

    <div class="row">
        <div class="col-md-8">
            <h3>Altere a sua senha</h3>
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            
                <div class="form-group">
                    <label for="inputPassword1" class="col-sm-3 control-label">Senha antiga</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword1" placeholder="Senha antiga" name="pass" maxlength="20" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword2" class="col-sm-3 control-label">Nova senha</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword2" placeholder="Nova senha" name="pass1" maxlength="20" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword2" class="col-sm-3 control-label">Confirmar senha</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword2" placeholder="Confirmar senha" name="pass2" maxlength="20" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <button type="submit" class="btn btn-primary" name="submit">Gravar</button>
                        <a class="btn btn-default" href="dashboard.php" role="button">Voltar</a>
                        <input type="hidden" name="enviado" value="TRUE" />
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php
    include ('includes/footer.php');
?>
