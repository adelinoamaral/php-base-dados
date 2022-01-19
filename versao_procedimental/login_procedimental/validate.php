<?php
include("config.php");
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($mysqli, $username);

$query = "SELECT username, password FROM users WHERE username = '$username' AND password='$password';";
$result = mysqli_query($mysqli, $query);

if(mysqli_num_rows($result) == 1)
{
	// utilizador registado
	$_SESSION['user'] = $username;
	header('Location: home.php');
}
else{
	// utilizador não registado - reencaminha para formulário
	header('Location: login.html');
}
?>
