<?php
require_once 'config.php';
 
// Define variáveis e inicializa-as a vazio
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";
 

if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Obtém o valor de id oculto
    $id = $_POST["id"];
    
    
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        
        $name_err = "Insira o nome.";
        
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZÇç'-.\s ]+$/")))){
        $name_err = 'Insira um nome válido.';
    } else{
        $name = $input_name;
    }
    
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = 'Insira um endereço.';     
    } else{
        $address = $input_address;
    }
    
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        
        $salary_err = "Insira o slário.";    
        
    } elseif(!ctype_digit($input_salary)){
        
        $salary_err = 'Insira um valor inteiro.';
        
    } else{
        $salary = $input_salary;
    }
    
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        
        // Prepara o comando UPDATE
        $sql = "UPDATE employees SET name=?, address=?, salary=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_address, $param_salary, $param_id);
            
            // Atribui parâmetros
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            $param_id = $id;
            
            // Executa o comando preparado
            if(mysqli_stmt_execute($stmt)){
                
                header("location: index.php");
                exit();
                
            } else{
                echo "Ocorreu um erro. Tente mais tarde.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
    
} else{
    // Parâmetro passado peloa URI
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        
        $id =  trim($_GET["id"]);
        
        $sql = "SELECT * FROM employees WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $name = $row["name"];
                    $address = $row["address"];
                    $salary = $row["salary"];
                    
                } else{
                    
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Ocorreu um erro. Tente mais tarde.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <title>Atualiza Registo</title>
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
                        <h2>Atualiza Registo</h2>
                    </div>
                    <p>Altere os campos do formulário para atualizar o registo.</p>
                    
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                       
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Nome</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Endereço</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Salário</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Gravar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                        
                    </form>
                    
                </div>
            </div>        
        </div>
    </div>
</body>
</html>