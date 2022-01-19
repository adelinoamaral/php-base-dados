<?php
	$mem_id = $_REQUEST['mem_id'];

	require_once 'class.php';
	$conn = new db_class();
	 $fetch = $conn->member_id($mem_id);
?>
<div class = "form-group">
	<label>Nome</label>
	<input type = "text" name = "firstname" value = "<?php echo $fetch['firstname']?>" class = "form-control" />
	<input type = "hidden" name = "mem_id" value = "<?php echo $mem_id?>" />
</div>
<div class = "form-group">
	<label>Apelido</label>
	<input type = "text" name = "lastname" value = "<?php echo $fetch['lastname']?>" class = "form-control" />
</div>
