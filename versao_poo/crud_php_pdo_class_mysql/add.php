<?php 
// Start session 
session_start(); 
 
// Get data from session 
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : ''; 
 
// Get status from session 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $status = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
 
// Get submitted form data  
$postData = array(); 
if(!empty($sessData['postData'])){ 
    $postData = $sessData['postData']; 
    unset($_SESSION['postData']); 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiciona Utilizador</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 head mt-4">
            <h5>Adiciona Utilizador</h5>
            
            <!-- Back link -->
            <div class="float-right">
                <a href="index.php" class="btn btn-success"><i class="back"></i> Voltar</a>
            </div>
        </div>
        
        <!-- Status message -->
        <?php if(!empty($statusMsg)){ ?>
            <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
        <?php } ?>
        
        <div class="col-md-12">
            <form method="post" action="action.php" class="form">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="name" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" required="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" required="">
                </div>
                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>" required="">
                </div>
                <input type="hidden" name="action_type" value="add"/>
                <input type="submit" class="form-control btn-primary" name="submit" value="Adiciona Utilizador"/>
            </form>
        </div>
    </div>
</div>
</body>
</html>