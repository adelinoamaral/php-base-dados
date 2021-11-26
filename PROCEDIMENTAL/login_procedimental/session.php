<?php
session_start();

// verifica se utilizador fez sessão
if(!isset($_SESSION['user'])){
	header("location:index.php");
	}
?>
