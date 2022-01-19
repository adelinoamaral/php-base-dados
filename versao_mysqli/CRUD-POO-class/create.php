<?php
	require_once 'class.php';
	
	if(ISSET($_POST['save'])){	
		$firstname = $_POST['firstname'];
		$lastname  = $_POST['lastname'];
		$conn = new db_class();
		$conn->create($firstname, $lastname);
		header('location: index.php');
	}	
	
?>