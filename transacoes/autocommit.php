<?php

    $con = new mysqli('localhost', 'root', '', 'systems');
    if(mysqli_connect_errno())
    {
        printf("Falha: %s", mysqli_connect_error());
        exit();
    }

    $con->autocommit(TRUE);

    //if($result = $con->query("SELECT @@autocommit"))
    if($result = $con->query("SELECT * FROM city"))
    {
        $row = $result->fetch_row();
        printf("Autocommit is: %s", $row[0]);
        $result->free();
    }
    $con->close();
?>