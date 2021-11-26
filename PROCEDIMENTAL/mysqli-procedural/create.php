<?php

    require_once 'config.php';

    // Define as variáveis e inicializa a vazio
    $name = $address = $salary = "";
    $name_err = $address_err = $salary_err = "";
 
// Verifica se o formulário foi processado (submetido)
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validação do campo nome do formulário
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Por favor, insira o nome.";
        
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZÇç'-.\s ]+$/")))){
        $name_err = 'Por favor, insira um nome válido.';
    } else{
        $name = $input_name;
    }
    
    // Validação do campo endereço do formulário
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = 'Por favor, insira um endereço.';     
    } else{
        $address = $input_address;
    }
    
    // Validação do campo salário do formulário
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        
        $salary_err = "Por favor, insira o salário.";  
        
    } elseif(!ctype_digit($input_salary)){
        
        $salary_err = 'Por favor, insira um inteiro positivo.';
        
    } else{
        $salary = $input_salary;
    }
    
    // Analisa erros detetados antes de inserir na base de dados
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        
        $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_name, $param_address, $param_salary);
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                // Records created successfully. Redirect to landing page
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
}
?>
 
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <title>Cria Registo</title>
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
                        <h2>Cria Registo</h2>
                    </div>
                    <p>Preencha os campos do formulário para adicionar ma base de dados e clique no botão.</p>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       
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
                        
                        <input type="submit" class="btn btn-primary" value="Gravar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                        
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>