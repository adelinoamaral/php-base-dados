    
    
    <?php

        // define o título à página
        $titulo = "Cria Produtor";
        include "includes/header.php";
       
        // Verifica se o formulário foi enviado:
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // ligação ao servidor/base de dados MySQL
            require_once ('ligaDB.php');
            
            $designacao  = $con->real_escape_string(trim($_POST['designacao']));
            $preco       = $con->real_escape_string(trim($_POST['preco'])); 
            
            // A função mysqli_real_escape_string evita problemas de SQL Injection
            $sql = "INSERT INTO produtos (produto_designacao, produto_preco, produto_dataregisto) ";
            $sql .= "VALUES ('$designacao', $preco, NOW() )";

            // executa a instrução SQL
            $result = $con->query ($sql);
            
            /*
                $con->affected_row = retorna o número de linhas afetadas pela última consulta 
                INSERT, UPDATE, REPLACE ou DELETE associada ao parâmetro $con indicado
            */
            
            if ($result) { // Query executada com sucesso

                header('location: dashboard.php?erro=Produto guardado com sucesso');

            } else { // Ocorreram erros na execução da query

                // Fecha aligação à base de dados
                $con->close();
                header('location: dashboard.php?erro=O produto não foi registado');
            }

            // Fecha aligação à base de dados
            $con->close();
        }
          
    ?>

        <h3>Informações do Produto</h3>
        <div class="row">
            <div class="col-md-10">
                <?php
                if(isset($erro)){
                    echo '<div class="alert alert-warning" role="alert">';
                    echo "<strong>" . $erro . "</strong>"; 
                }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group">
                        <label for="InputNome">Designação</label>
                        <input type="text" class="form-control" id="InputNome" placeholder="designação" name="designacao" size="15" maxlength="20" value="<?php if(isset($_POST['designacao'])) echo $_POST['designacao']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="InputApelido">Preço</label>
                        <input type="text" class="form-control" id="InputApelido" placeholder="preço do produto" name="preco" size="15" maxlength="40" value="<?php if(isset($_POST['preco'])) echo $_POST['preco']; ?>" required>
                    </div>
                
                    <button type="submit" class="btn btn-primary" name="submit">Gravar</button>
                    <a class="btn btn-default" href="dashboard.php" role="button">Voltar</a>
                </form>
            </div>
        </div>
   
    <?php include "includes/footer.php"; ?>