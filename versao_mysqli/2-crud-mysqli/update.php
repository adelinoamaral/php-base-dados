<?php

    require_once "config.php";
    
    // Define as variaveis e inicializa-as a vazio
    $name = $address = $salary = "";
    $name_err = $address_err = $salary_err = "";
    
    // Processa os dados do formulário depois da submissão do formulário
    if(isset($_POST["id"]) && !empty($_POST["id"])){
        
        $id = $_POST["id"];
        
        // Valida o nome
        $input_name = trim($_POST["name"]);
        if(empty($input_name)){
            $name_err = "Insira o nome.";
        } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $name_err = "Insira um nome válido.";
        } else{
            $name = $input_name;
        }
        
        $input_address = trim($_POST["address"]);
        if(empty($input_address)){
            $address_err = "Insira o endereço.";     
        } else{
            $address = $input_address;
        }
        
        $input_salary = trim($_POST["salary"]);
        if(empty($input_salary)){
            $salary_err = "Insira o valor do salário.";     
        } elseif(!ctype_digit($input_salary)){
            $salary_err = "Insira um valor inteiro positivo.";
        } else{
            $salary = $input_salary;
        }
        
        if(empty($name_err) && empty($address_err) && empty($salary_err)){
            
            $sql = "UPDATE employees SET name=?, address=?, salary=? WHERE id=?";
    
            if($stmt = $con->prepare($sql)){
                
                $stmt->bind_param("sssi", $param_name, $param_address, $param_salary, $param_id);
                
                // define parâmteros
                $param_name = $name;
                $param_address = $address;
                $param_salary = $salary;
                $param_id = $id;
                
                if($stmt->execute()){
                    // Registo atualizado com sucesso
                    header("location: index.php");
                    exit();
                } else{
                    echo "Algo correu mal, tente mais tarde.";
                }
            }
           
            $stmt->close();
        }
        
        $con->close();
    } else{
        // Verifica se existe algum parâmtero passado pela URL
        if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
            
            $id =  trim($_GET["id"]);
            
            $sql = "SELECT * FROM employees WHERE id = ?";
            if($stmt = $con->prepare($sql)){
                
                $stmt->bind_param("i", $param_id);
                $param_id = $id;
                
                if($stmt->execute()){
                    $result = $stmt->get_result();
                    
                    if($result->num_rows == 1){
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        
                        $name = $row["name"];
                        $address = $row["address"];
                        $salary = $row["salary"];

                    } else{
                        header("location: error.php");
                        exit();
                    }
                    
                } else{
                    echo "Oops! Algo correu mal, tente mais tarde.";
                }
            }
            
            $stmt->close();
            
            $con->close();
        }  else{
        
            header("location: error.php");
            exit();
        }
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Atualize os dados do registo.</p>
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
                        <input type="submit" class="btn btn-primary" value="Graver">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>