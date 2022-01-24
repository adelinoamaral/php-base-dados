<?php

try{

    $con = new PDO('sqlite:demo.db');
    $st = $con->query("SELECT * FROM alunos");
    $rows = $st->fetchAll(PDO::FETCH_ASSOC);
    // print_r($rows);

    echo '<ul>';
    foreach ($rows as $row => $aluno){
        echo '<li>' . $aluno['nome'] . ' - ' .  $aluno['idade'] . '</li>';
    }
    echo '</ul>';
    
} catch(PDOException $e){
    die("ERRO: Não foi possível executar o comando. " . $e->getMessage());
}

?>