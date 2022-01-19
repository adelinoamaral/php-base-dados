<?php
    /*
		Ficheiro 9
		Date: 2017-11-16
    */

	// define config.php file
	require_once("config.php");
	
	$last_name = "Rambo";
	$email = "fafa@sapo.pt";

	$sql = "SELECT id, first_name FROM persons WHERE last_name=? AND email=?";

	$stmt = $mysqli->prepare($sql);

	if($stmt) {

		$stmt->bind_param("ss", $last_name, $email);

		if($stmt->execute())
		{
			// a sentença sql obtém 2 campos: id e firstname
			// o método
			$stmt->bind_result($userid, $name);
			$stmt->fetch();	// obtém valores
			echo $userid . " - " . $name;

			/*
			// no caso da sentença da query devolver vários valores
			while($stmt->fetch())
			{
				echo $userid . " - " . $name;
			}
			*/
		}
		$stmt->close();

	} else {
		echo "Ocorreu um erro...";
	}

	// Close connection
	$mysqli->close();
?>