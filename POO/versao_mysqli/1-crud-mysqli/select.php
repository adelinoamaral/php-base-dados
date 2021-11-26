<?php
    /*
        Ficheiro 6
        Date: 2017-11-16
    */

// define config.php file
require_once("config.php");
 
//$sql = "SELECT * FROM persons LIMIT 2, 4";
$sql = "SELECT * FROM persons";
$result = $mysqli->query($sql);

if($result){
    // Devolve o numero de linhas dos resultados da query
    if($result->num_rows > 0){
        
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>email</th>";
            echo "</tr>";
        
        // Obtém uma linha no formato array associativo, numérico ou ambos 
        while($row = $result->fetch_array())
        {
            /*
                Pode usar $row['id'] ou $row[0], $row['first_name'] ou $row[1] ...
            */
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        echo "<br><strong>Foram devolvidos:</strong> " . $result->num_rows . " registos";
        
        // Liberta o conjunto de registos
        $result->free();
    } else{
        
        echo "Não existem registos.";
    }
} else{
    echo "ERROR: erro na execução do comando $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>