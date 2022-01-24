<?php

$con = new PDO('sqlite:demo.db');
try{

    $sql = "SELECT * FROM alunos";
    $st = $con->query("SELECT * FROM alunos");
    $rows = $st->fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // print_r($rows); exit;
    

    echo '<ul>';
    foreach ($rows as $row => $aluno){
        echo $aluno['id'];
        echo "<li><a href=\"detalhesaluno.php?id=" . $aluno['id'] . "\">" . htmlspecialchars($aluno['nome']) . "</a></li>";
    }
    echo '</ul>';
} catch(PDOException $e){
    die("ERRO: Não foi possível executar o comando. " . $e->getMessage());
}

?>
