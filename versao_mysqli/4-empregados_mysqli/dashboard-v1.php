    
<?php 
    $titulo = "Dashboard";
    include "includes/header.php";

    require_once "ligaDB.php";

    if(isset($erro)){
        echo '<div class="alert alert-warning" role="alert">';
        echo "<strong>" . $erro ."</strong>"; 
        echo "</div>";
    }


    $reg_por_pagina = 3;     // registos por página

     /**
      *
        Determina o número de páginas
        p - parâmetro que guarda o número de registos por página inseridas
    */
    if (isset($_GET['p']) && is_numeric($_GET['p'])) {

        $paginas = $_GET['p'];

    } else {
        // Não existe parâmetro p
        // Conta o número de registos existentes na tabela utilizadores
        $sql = "SELECT COUNT(user_id) FROM utilizadores";
        $result = $con->query ($sql);

        $row = $result->fetch_array ();

        $registos = $row[0];   // guarda o número de registos

        // Calcula o número de páginas ...
        if ($registos > $reg_por_pagina) { // Mais que 1 página.
            
            // determina o número de páginas em função do número de registos
            $paginas = ceil ($registos/$reg_por_pagina);  // ceil arredonda para cima
            
        } else {
            
            $paginas = 1;	// só há registos para uma página.
        }

    }


    /**
        Determina o início de cada página em termos de número de registos
        s - parâmetro que guarda o início de cada página
    */
    if (isset($_GET['s']) && is_numeric($_GET['s'])) {
        $inicio = $_GET['s'];
    } else {
        $inicio = 0;
    }


     // Devolve os registos a partir da posição inicio + reg_por_pagina (nº de registos por página)

    $sql = "SELECT user_apelido, user_nome, DATE_FORMAT(user_dataregisto, '%d/%m/%Y') AS dr, user_id ";
    $sql .= "FROM utilizadores ORDER BY user_dataregisto ASC LIMIT $inicio, $reg_por_pagina";

    // Executa a query
    $result = $con->query ($sql);

    if ($result->num_rows > 0) {

        echo "<a class='btn btn-info' href='cria_utilizador.php' role='button' style='margin-bottom: 10px;margin-top: 20px;'>Adicionar utilizador</a>";

        echo '<table class="table table-hover">';
            echo '<tr>
                  <td><b>Nome</b></td>
                  <td><b>Apelido</b></td>
                  <td><b>Data Registo</b></td>
                  <td>Ação</td>
              </tr>';

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
        
        $con->close();
        $result->free_result (); // Liberta a memória associada ao resultado
        
        
        
        /*
            Cria os links para outras páginas se necessário.
            Determina as páginas
        */	
        if ($paginas > 1) {


            // Determina a página corrente	
            $pagina_corrente = ($inicio/$reg_por_pagina) + 1;
            
            echo '<nav aria-label="Page navigation">';
                echo '<ul class="pagination">';
                    // Se não é a primeira página então define a anterior
                    if ($pagina_corrente != 1) 
                    {
                        echo '<li>';
                            echo '<a href="dashboard.php?s=' . ($inicio - $reg_por_pagina) . '&p=' . $paginas  . '" aria-label="Previous">';
                                echo '<span aria-hidden="true">&laquo;</span>';
                            echo '</a>';
                        echo  '</li>';
                    }

            // Mostra o número de todas as páginas
            for ($i = 1; $i <= $paginas; $i++) 
            {
                if ($i != $pagina_corrente) 
                {
                    
                    echo '<li><a href="dashboard.php?s=' . (($reg_por_pagina * ($i - 1))) . '&p=' . $paginas  . '">' . $i . '</a></li>';
                } else {
                    echo '<li class="active"><a href="#">' . $i . ' <span class="sr-only">(current)</span></a></li>';
                }
            }

            // Se não é a última página então mostra Próximas
            if ($pagina_corrente != $paginas) 
            {
                
                echo '<li>';
                    echo '<a href="dashboard.php?s=' . ($inicio + $reg_por_pagina) . '&p=' . $paginas . '" aria-label="Next">';
                        echo '<span aria-hidden="true">&raquo;</span>';
                    echo '</a>';
                echo '</li>';
            }

    
            echo '</ul>';
        echo '</nav>';
        
        }
        
    } else {

       //if(isset($erro)){
            echo '<div class="alert alert-warning" role="alert">';
                echo "<strong>Não há utilizadores registados</strong>"; 
            echo "</div>";
        //}

    }

    include "includes/footer.php";
?>