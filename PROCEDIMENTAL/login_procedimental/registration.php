<?php
	include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="icon-bar">
  <a href="home.php"><i class="fa fa-home"></i></a>
  <a href="users.php"><i class="fa fa-user"></i></a>
  <a class="active" href="registration.php"><i class="fa fa-registered"></i></a>
  <a href="print_all.php" target="_blank"><i class="fa fa-print"></i></a>
  <a href="logout.php"><i class="fa fa-power-off"></i></a>
</div>

<h2>Sign Up</h2>
<hr/>
<form action="register.php" method="POST">
  <div class="container">
	<input type="text" placeholder="nome" name="firstname" required>
    <input type="text" placeholder="apelido" name="lastname" required>
  	<label>Aniversário</label>
    <input type="date" name="birthdate" required>
    <input type="text" placeholder="Username" name="username" required>
    <input type="password" placeholder="Senha" name="password" required>
    <input type="password" placeholder="Confirmar Senha" name="psw-repeat" required>

    <div class="clearfix">
      <button type="submit" class="signupbtn">Registar</button>
	  <button type="reset" class="cancelbtn">Cancelar</button>
    </div>
  </div>
</form>
