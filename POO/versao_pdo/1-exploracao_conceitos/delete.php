<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once "config.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM persons WHERE id = :id";
    
    if($stmt = $link->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":id", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to landing page
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Algo de errado aconteceu. Tente mais tarde.";
        }
    }
    unset($stmt);
    unset($link);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
</head>
<body>
    
    <div>
        <h1>Apagar Registo</h1>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
            <p>Tem a certeza de que quer apagar o registo?</p><br>
            <p>
                <input type="submit" value="Yes">
                <a href="index.php">No</a>
            </p>
        </div>
    </form>
                
</body>
</html>