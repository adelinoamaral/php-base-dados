<?php
    $titulo = "Apagar Artigo";
    include "includes/header.php";

    /*
        verifica se o id do utilizador é válido, através do método GET ou POST.
        Identifica o ID através da URL ou do formulário
    */
    if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) 
    {

        $id = $_GET['id'];

    } elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // submissão do form deste ficheiro
        
        $id = $_POST['id'];

    } else { // o id não é válido
        
        echo '<p class="erro">Esta página não está acessível.</p>';
        include ('includes/footer.php'); 
        exit();
    }


    require_once ('ligaDB.php');

    if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['enviado'])) {

        // eliminação do registo
        if ($_POST['confirma'] == 'Sim') {

            // Apaga p utilizador com o $id
            $sql = "DELETE FROM produtos WHERE produto_id=$id LIMIT 1";
            $resultado = $con->query ($sql);

            /*
                $con->affected_row = retorna o número de linhas afetadas pela última consulta 
                INSERT, UPDATE, REPLACE ou DELETE associada ao parâmetro $con indicado
            */
            if ($con->affected_rows == 1) 
            {
                $frase = "O artigo foi eliminado";
                header("location: dashboard.php?erro=$frase");

            } else {

                //$frase = '<p>' . $con->error() . '<br />Query: ' . $sql . '</p>';
                $frase = "O artigo não foi eliminado. Existe um problema no sistema!";
                header("location: dashboard.php?erro=$frase");

                // O utilizador a eliminar poderá não existir na base de dados
                //echo '<p>' . $con->error() . '<br />Query: ' . $sql . '</p>';
            }

        } 
        else // $_POST['confirma'] == 'Nao'
        {
            $frase = "O artigo não foi eliminado.";
            header("location: dashboard.php?erro=$frase");
        }

    } else { // Mostra formulário

        // a função CONCAT junta o apelido e o nome do utilizador
       $sql = "SELECT * FROM produtos WHERE produto_id=$id";
       $resultado = $con->query ($sql);

        // $resultado->num_rows = número de registos devolvidos pelo comando SELECT.
        if ($resultado->num_rows == 1) 
        {

            /* 
                Obtém informação do utilizador devolvendo um registo em forma de array.
                O índice do array é um número inteiro.
            */
            $row = $resultado->fetch_array ();
            

            /*
                htmlspecialchars — Converte caracteres especiais para a realidade HTML.
                '&' (ampersand) torna-se '&amp;'
                '"' (aspas dupla) torna-se '&quot;' quando ENT_NOQUOTES não está definida.
                ''' (aspas simples) torna-se '&#039;' apenas quando ENT_QUOTES está definida.
                '<' (menor que) torna-se '&lt;'
                '>' (maior que) torna-se '&gt;'
            */
            echo '<form class="form-horizontal" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';

                echo '<div class="form-group">';
                    echo '<label class="col-md-5 control-label">Pretende eliminar o ' . $row[0] . ' - ' . $row[1] . '?</label>';
                echo '</div>';

                echo '<div class="form-group">';
                    echo '<div class="col-sm-offset-2 col-sm-10">';
                        echo '<label class="radio-inline">';
                        echo '<input type="radio" name="confirma" value="Sim"> Sim';
                        echo '</label>';
                        echo '<label class="radio-inline">';
                        echo '<input type="radio" name="confirma" value="Não" checked="checked"> Não';
                        echo '</label>';
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-group">';
                    echo '<div class="col-sm-offset-2 col-sm-10">';
                        echo '<input type="submit" class="btn btn-default" name="submit" value="Eliminar" />';
                        echo '<a class="btn btn-default" href="dashboard.php" role="button">Voltar</a>';
                        echo '<input type="hidden" name="enviado" value="TRUE" />';
                        echo '<input type="hidden" name="id" value="' . $id . '" />';
                    echo '</div>';
                echo '</div>';
            echo '</form>';

            unset($row);

        } else {
            
            $resultado->free_result();
            $con->close();
            
            $frase = "O utilizador não existe na base de dados.";
            header("location: dashboard.php?erro=$frase");
        }

    }

    $resultado->free_result();
    $con->close();

    include "includes/footer.php";
?>



