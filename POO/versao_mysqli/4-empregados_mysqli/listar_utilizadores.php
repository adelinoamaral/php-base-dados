    
<?php 

    // define o título à página
    $titulo = "Dashboard";
    include "includes/header.php";

    // cria ligação á base de dados
    require_once "ligaDB.php";

    // apresenta erro vindo de outra página
    if(isset($erro)){
        echo '<div class="alert alert-warning" role="alert">';
        echo "<strong>" . $erro ."</strong>"; 
        echo "</div>";
    }

    // seleciona da tabela a informação a apresentar
    $sql = "SELECT user_apelido, user_nome, DATE_FORMAT(user_dataregisto, '%d/%m/%Y') AS dr, user_id ";
    $sql .= "FROM utilizadores ORDER BY user_dataregisto ASC";

    // Executa a query
    $result = $con->query ($sql);

    // $result->num_rows = representa o número de registos do SELECT
    if ($result->num_rows > 0) {

        echo "<a class='btn btn-info' href='cria_utilizador.php' role='button' style='margin-bottom: 10px;margin-top: 20px;margin-right: 15px;'>Adicionar utilizador</a>";
        echo "<a class='btn btn-info' href='dashboard.php' role='button' style='margin-bottom: 10px;margin-top: 20px;'>Lista Produtos</a>";

        echo '<table class="table table-hover">';
            echo '<tr>
                  <td><b>Nome</b></td>
                  <td><b>Apelido</b></td>
                  <td><b>Data Registo</b></td>
                  <td>Ação</td>
              </tr>';

            /* 
                $result->fetch_assoc() = extrai um registo dos resultados da query. Representa um array associativo.
                Devolve um array associativo com os registos (os nomes dos campos ficam representados pelos índices do array)
                ou NULL se não houver registos.
                
                $result->fetch_row() = extrai um registo dos resultados da query representado por um array.
                O acesso aos elementos do array é feito pelo índice inteiro.
            */
            while ($row = $result->fetch_assoc()) 
            {
                echo '<tr>
                        <td>' . $row['user_nome'] . '</td>
                        <td>' . $row['user_apelido'] . '</td>
                        <td>' . $row['dr'] . '</td>
                        <td> 
                            <a href="visualiza_utilizador.php?id=' . $row['user_id'] . '" title="Visualiza Registo" data-toggle="tooltip"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;&nbsp;
                            <a href="edita_utilizador.php?id=' . $row['user_id'] . '" title="Atualiza Registo" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;&nbsp;
                            <a href="apaga_utilizador.php?id=' . $row['user_id'] . '" title="Elimina Registo" data-toggle="tooltip"><span class="glyphicon glyphicon-trash"></span></a>
                            
                            
                            
                        </td>
                      </tr>';
            }
        echo '</table>';
                
        /* 
            Liberta a memória associada ao resultado da consulta, mesmo se a consulta for NULL.
             $result->close(); é uma outra solução equivalente.
        */
        $result->free_result();
        unset($row);
        
        /* 
            fecha a ligação com a base de dados especificada com $con
            devolve true se sucesso;
        */
        $con->close();

    } else {

       //if(isset($erro)){
            echo '<div class="alert alert-warning" role="alert">';
                echo "<strong>Não há utilizadores registados</strong>"; 
            echo "</div>";
        //}

    }

    include "includes/footer.php";
?>