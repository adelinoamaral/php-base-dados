<?php
include("config.php");
include("session.php");

$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$birthdate = $_POST['birthdate'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users(firstname, middlename, lastname, birthdate, username, password)
VALUES('$firstname', '$middlename', '$lastname', '$birthdate', '$username', '$password')";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'alert("Um novo utilizador foi registado!");';
	echo 'window.location="home.php";';
	echo '</script>';

} else {
	echo '<script language="javascript">';
	echo 'alert("O utilizador já existe!");';
	echo 'window.location="registration.php";';
	echo '</script>';
}
?>
