<?php
    $titulo = "Visualiza Artigo";
    include("includes/header.php"); 

    require_once "ligaDB.php";

    if(isset($_GET['id'])) $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE produto_id='$id' LIMIT 1";

    // Executa a query
    $result = $con->query ($sql);

    if ($result->num_rows > 0) {

        echo '<table class="table table-hover">';
            echo '<tr>
                  <td><b>Designação</b></td>
                  <td><b>Preço</b></td>
                  <td><b>Data Registo</b></td>
              </tr>';

            $row = $result->fetch_assoc(); 
            echo '<tr>
                        <td>' . $row['produto_designacao'] . '</td>
                        <td>' . $row['produto_preco'] . '€</td>
                        <td>' . $row['produto_dataregisto'] . '</td>
                 </tr>';
        echo '</table>';
        
        $result->free_result (); // Liberta a memória associada ao resultado
        $con->close();
        unset($row);
        
        echo "<a class='btn btn-default' href='dashboard.php' role='button'>Voltar</a>";
    } else {

       if(isset($erro)){
            echo '<div class="alert alert-warning" role="alert">';
                echo "<strong>Não há informação sobre o artigo.</strong>"; 
            echo "</div>";
        }

    }

    include "includes/footer.php";
?>
 