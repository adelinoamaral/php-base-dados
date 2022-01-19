<?php

    $con = new mysqli('localhost', 'root', '', 'systems');
    if(mysqli_connect_errno())
    {
        printf("Falha: %s", mysqli_connect_error());
        exit();
    }

    $con->autocommit(FALSE);
    
    // Cria e insere registos na tabela myCity
    $con->query("CREATE TABLE myCity LIKE city");
    $con->query("ALTER TABLE myCity Type=InnoDB");
    $con->query("INSERT INTO myCity SELECT * FROM city LIMIT 50");

    //
    $con->commit();

    // Apaga todos os registos da tabela myCity
    $con->query("DELETE FROM myCity");

    // devolve 0 registos pois a tabela está vazia
    if($result = $con->query("SELECT count(*) FROM myCity"))
    {
        $row = $result->fetch_row();
        printf("%d rows in table myCity.\n<br>", $row[0]);
        $result->close();
    }
    
    //
    $con->rollback();

    // devolve os 50 registos apagados
    if($result = $con->query("SELECT count(*) FROM myCity"))
    {
        $row = $result->fetch_row();
        printf("%d rows in table myCity (after  rollback).\n", $row[0]);
        $result->close();
    }

    // apaga a tabela myCity
    $con->query("DROP TABLE myCity");

    $con->close();
?>