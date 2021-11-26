<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listagem Empregados</title>
    <!-- carrega bootstrap v3.3.7 e fontawesome 5.5.0 -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.min.css">
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Detalhes do empregados</h2>
                        <a href="create.php" class="btn btn-success pull-right">Adiciona Novo Empregado</a>
                    </div>
                    <?php
                    
                    // definições da base de dados
                    require_once "config.php";
                    // lista todos os registos da tabela employees
                    $sql = "SELECT * FROM employees";
                    // executa o comando SQL
                    if($result = $con->query($sql)){
                        // verifica se existem registos da query (comando SQL)
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nome</th>";
                                        echo "<th>Endereço</th>";
                                        echo "<th>Salário</th>";
                                        echo "<th>Ação</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                // percorre os registos da query
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['salary'] . "</td>";
                                        echo "<td>";
                                            // cria hiperligações para as funcionalidades do CRUD (algumas)
                                            echo "<a href='read.php?id=". $row['id'] ."' title='Ver Registo' data-toggle='tooltip'><i class='far fa-eye'></i></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Atualizar Registo' data-toggle='tooltip'><i class='far fa-edit'></i></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Eliminar Registo' data-toggle='tooltip'><i class='far fa-trash-alt'></i></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            
                            // liberta os registos da query da memória RAM
                            $result->free();
                        } else{
                            echo "<p class='lead'><em>Não existem registos a visualizar.</em></p>";
                        }
                    } else{
                        echo "ERROR: Não é possível executar o comando: $sql. " . $con->error;
                    }
                    
                    // fecha o ligação à base de dados
                    $con->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>

    <!-- carrega os script javascript necessários para o funcionamento do bootstrap -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/all.min.js"></script>

</body>
</html>