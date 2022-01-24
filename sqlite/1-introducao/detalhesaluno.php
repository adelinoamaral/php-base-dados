<?php

$con = new PDO('sqlite:demo.db');
try{

    $sql = "SELECT * FROM alunos WHERE id = :idade";
    $st = $con->prepare($sql);

    // get value from qquerystring and bind
    // http://localhost/detalhesaluno.php?id=2
    $id = filter_input(INPUT_GET, 'id');
    $st->bindValue(':idade', $id, PDO::PARAM_INT);
    $st->execute();

    // create array of records
    $row = $st->fetch();
    $db = null;
    if(!$row){
        echo "Não há alunos registados";
        die();
    }    
} catch(PDOException $e){
    die("ERRO: Não foi possível executar o comando. " . $e->getMessage());
}

// Se os dados vierem de um formulário o filtro serial
// $nome = filter_input(INPUT_POST, 'nome);

?>

<h1><?php echo htmlspecialchars($row['nome']); ?></h1>
<p>Email: <?php echo htmlspecialchars($row['email']); ?></p>
<p>Idade: <?php echo htmlspecialchars($row['idade']); ?></p>
