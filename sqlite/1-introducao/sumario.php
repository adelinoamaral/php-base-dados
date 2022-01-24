<?php

try{

    $con = new PDO('sqlite:demo.db');
    $st = $con->query("SELECT COUNT(*) FROM alunos");
    $studentsCount = $st->fetchColumn();
    echo "O número de registos na tabela alunos: $studentsCount <br>";

    $st = $con->query("SELECT MIN(idade) FROM alunos");
    $studentsAge = $st->fetchColumn();
    echo "O aluno mais novo tem idade: $studentsAge <br>";

    $st = $con->query("SELECT Max(idade) FROM alunos");
    $studentsAge = $st->fetchColumn();
    echo "O aluno mais velho tem idade: $studentsAge <br>";
    
    
} catch(PDOException $e){
    die("ERRO: Não foi possível executar o comando. " . $e->getMessage());
}

?>