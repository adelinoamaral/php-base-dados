<?php
include("config.php");
include("session.php");

$id = $_GET['id'];


$sql = "DELETE FROM users WHERE username='$id'";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'alert("O Registo foi eliminado com sucesso!");';
	echo 'window.location="users.php";';
	echo '</script>';

} else {
	echo '<script language="javascript">';
	echo 'alert("Ocorreu um erro na atualização!");';
	echo 'window.location="users.php";';
	echo '</script>';
}
?>
