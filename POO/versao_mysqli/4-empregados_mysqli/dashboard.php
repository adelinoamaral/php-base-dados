    
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

    echo "<a class='btn btn-info' href='cria_produto.php' role='button' style='margin-bottom: 10px;margin-top: 20px;'>Adicionar Produtos</a>";

    // seleciona da tabela a informação a apresentar
    $sql = "SELECT produto_designacao, produto_preco, DATE_FORMAT(produto_dataregisto, '%d/%m/%Y') AS dr, produto_id ";
    $sql .= "FROM produtos ORDER BY produto_dataregisto ASC";

    // Executa a query
    $result = $con->query ($sql);

    // $result->num_rows = representa o número de registos do SELECT
    if ($result->num_rows > 0) {

        echo '<table class="table table-hover">';
            echo '<tr>
                  <td><b>Designação</b></td>
                  <td><b>Preço</b></td>
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
                        <td>' . $row['produto_designacao'] . '</td>
                        <td>' . $row['produto_preco'] . '</td>
                        <td>' . $row['dr'] . '</td>
                        <td> 
                            <a href="visualiza_produto.php?id=' . $row['produto_id'] . '" title="Visualiza Artigo" data-toggle="tooltip"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;&nbsp;
                            <a href="edita_produto.php?id=' . $row['produto_id'] . '" title="Atualiza Artigo" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;&nbsp;
                            <a href="apaga_produto.php?id=' . $row['produto_id'] . '" title="Elimina Artigo" data-toggle="tooltip"><span class="glyphicon glyphicon-trash"></span></a>
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
                echo "<strong>Não há produtos registados</strong>"; 
            echo "</div>";
        //}

    }

    include "includes/footer.php";
?>