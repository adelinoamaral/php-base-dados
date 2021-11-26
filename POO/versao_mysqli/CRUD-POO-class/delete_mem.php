<?php
	require_once 'class.php';
	
	$mem_id = $_REQUEST['mem_id'];
	$conn = new db_class();
	$conn->delete($mem_id);
	header('location:index.php');
?>