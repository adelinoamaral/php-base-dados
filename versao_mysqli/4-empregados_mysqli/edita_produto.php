        
    <?php
        $titulo = "Editar Artigo";
        include "includes/header.php";
        
        // O formulário não foi submetido
        if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From ver_utilizadores.php
            $id = $_GET['id'];

        } elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
            $id = $_POST['id'];

        } else { // O ID não é válido
            echo '<p class="erro">Esta página não é acessível.</p>';
            include ('includes/footer.php'); 
            exit();
        }
        
        
        // ligação ao servidor/base de dados MySQL
        require_once ('ligaDB.php');

        
        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['enviado'])) {

            $designacao = $con->real_escape_string(trim($_POST['designacao']));
            $preco      = $con->real_escape_string(trim($_POST['preco']));
            

            // atualiza o registo
            $q = "UPDATE produtos SET produto_designacao='$designacao', produto_preco='$preco' WHERE produto_id=$id LIMIT 1";
            $r = $con->query ($q);

            if ($con->affected_rows == 1) {
                
                header("location: dashboard.php?erro=O artigo foi atualizado");

            } else {

                header("location: dashboard.php?erro=O artigo não foi alterado. As nossas desculpas.");
            }
            $con->close();
        }   // ./$_SERVER["REQUEST_METHOD"]
        
        
        
        // Mostra sempre o formulário
        $sql = "SELECT * FROM produtos WHERE produto_id=$id";
        $r = $con->query ($sql);
        
        if ($r->num_rows == 1) 
        {
            $row = $r->fetch_array();

            echo '<div class="row">';
            echo '<div class="col-md-10">';
                if(isset($erro)){
                    echo '<div class="alert alert-warning" role="alert">';
                    echo "<strong>" . $erro . "</strong>"; 
                }
                echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
                    echo '<div class="form-group">';
                        echo '<label for="InputDesignacao">Designação: </label>';
                        echo '<input type="text" class="form-control" id="InputDesignacao" placeholder="Designação do artigo" name="designacao" maxlength="20" value="' . $row[1] . '" required>';
                    echo '</div>';
                    echo '<div class="form-group">';
                        echo '<label for="InputPreco">Preço</label>';
                        echo '<input type="text" class="form-control" id="InputPreco" placeholder="Preço do artigo" name="preco" maxlength="5" value="' . $row[2] .  '" required>';
                    echo '</div>';
                    
                    echo '<button type="submit" class="btn btn-primary" name="submit">Gravar</button>';
                    echo '<a class="btn btn-default" href="dashboard.php" role="button">Voltar</a>';
                    echo '<input type="hidden" name="enviado" value="TRUE" />';
                    echo '<input type="hidden" name="id" value="' . $id . '" />';
                echo "</form>";
            echo "</div>";
            echo "</div>";
            unset($row);

        } else { // O ID do utilizador não existe
            echo '<p class="erro">Página não está acessível.</p>';
        }

        $con->close();

        include "includes/footer.php";
    ?>