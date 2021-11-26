<?php

    // id vindo do formulário
    if(isset($_POST["id"]) && !empty($_POST["id"])){
        
        require_once "config.php";
      
        $sql = "DELETE FROM employees WHERE id = ?";  
        if($stmt = $con->prepare($sql)){
            $stmt->bind_param("i", $param_id);

            $param_id = trim($_POST["id"]);
            if($stmt->execute()){
                
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Algo correu mal, tente mais tarde.";
            }
        }
        
        $stmt->close();
        $con->close();

    } else{
        
        // Verifica a existência do parâmetro id 
        if(empty(trim($_GET["id"]))){
            
            header("location: error.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eminina Registo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Tem acerteza que pretende eliminar o registo?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">Não</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>