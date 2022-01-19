<?php
// Verifica a existência do parametro id antes de processar a informação
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    
    require_once "config.php";
    
    $sql = "SELECT * FROM employees WHERE id = ?";
    
    if($stmt = $con->prepare($sql)){
        // liga a variável às sentença preparada
        $stmt->bind_param("i", $param_id);
        
        // atribui parâmetro
        $param_id = trim($_GET["id"]);
        
        if($stmt->execute()){
            $result = $stmt->get_result();
            
            if($result->num_rows == 1){
                // Obtém os registos como um array associativo
                $row = $result->fetch_array(MYSQLI_ASSOC);
                // estas váriáveis serão usadas no formulário
                $name       = $row["name"];
                $address    = $row["address"];
                $salary     = $row["salary"];
            } else{
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Ocorreu um problema, tente mais tarde.";
        }
    }
    
    $stmt->close();
    
    $con->close();
} else{
    // URL não contém o parâmetro id. Vai ser redirecionado para uma página de erro
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Registo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                        <h1>Ver detalhes do registo</h1>
                    </div>
                    <div class="form-group">
                        <label>Nome</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <p class="form-control-static"><?php echo $row["address"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Salário</label>
                        <p class="form-control-static"><?php echo $row["salary"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Voltar</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>