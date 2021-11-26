<?php
    $titulo = "Visualiza Utilizador";
    include("includes/header.php"); 

    require_once "ligaDB.php";

    if(isset($_GET['id'])) $id = $_GET['id'];

    $sql = "SELECT user_apelido, user_nome, DATE_FORMAT(user_dataregisto, '%d/%m/%Y') AS dr, user_id ";
    $sql .= "FROM utilizadores WHERE user_id='$id' LIMIT 1";

    // Executa a query
    $result = $con->query ($sql);

    if ($result->num_rows > 0) {

        echo '<table class="table table-hover">';
            echo '<tr>
                  <td><b>Nome</b></td>
                  <td><b>Apelido</b></td>
                  <td><b>Data Registo</b></td>
              </tr>';

            $row = $result->fetch_assoc(); 
            echo '<tr>
                        <td>' . $row['user_nome'] . '</td>
                        <td>' . $row['user_apelido'] . '</td>
                        <td>' . $row['dr'] . '</td>
                 </tr>';
        echo '</table>';
        
        $result->free_result (); // Liberta a memória associada ao resultado
        $con->close();
        unset($row);
        
        echo "<a class='btn btn-info' href='processa/utilizador_pdf.php?id=" . $id . "' role='button' target='_blank'>Criar PDF</a>&nbsp;&nbsp;&nbsp;";
        echo "<a class='btn btn-default' href='dashboard.php' role='button'>Voltar</a>";
    } else {

       if(isset($erro)){
            echo '<div class="alert alert-warning" role="alert">';
                echo "<strong>Não há informação sobre o utilizador.</strong>"; 
            echo "</div>";
        }

    }

    include "includes/footer.php";
?>
 