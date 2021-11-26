<?php

    // elimina as variáveis de sessão
    $_SESSION = array();

    // destroi a sessão com segurança
    session_start();
    session_destroy();
    setcookie('PHPSESSID', '', time() - 3600, '/', '', 0, 0);	// apaga o cookie

    // redireciona para o index.php
    header("Location: ../");
?>