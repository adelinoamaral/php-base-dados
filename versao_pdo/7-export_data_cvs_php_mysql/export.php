<?php  
    include 'functions.php';
    $pdo = pdo_connect_mysql();
    $output = '';
    if(isset($_POST["export"]))
    {
    $sql = "SELECT * FROM contacts";
    $results = $pdo->query($sql);
    if ($results->rowCount() > 0)
    {
    $output .= '
    <table class="table">  
        <tr>  
            <th>Nome</th>  
            <th>Email</th>  
        </tr>
    ';
    while ($row = $results->fetch())
    {
        $output .= '
            <tr>  
                <td>'.$row["idContact"].'</td>  
                <td>'.$row["name"].'</td>  
                <td>'.$row["email"].'</td>  
            </tr>
        ';
    }
    $output .= '</table>';

    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=download.xls');
    echo $output;
    }
}
?>