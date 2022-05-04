<?php
include 'functions.php';
?>

<?=template_header('Home')?>

<div class="container">
	<h2 class="mt-4 mb-3">Lista de Contactos</h2>
	<?php
		$pdo = pdo_connect_mysql();
		$sql = 'SELECT * FROM contacts';
		$results = $pdo->query($sql);
		// Fetch the records so we can display them in our template.
		$contacts = $results->fetchAll(PDO::FETCH_ASSOC);
		table_header();
		foreach ($contacts as $contact){
		echo "<tr>
			<td>" . $contact['idContact'] . "</td>
			<td>" . $contact['name'] . "</td>
			<td>" . $contact['email'] . "</td>
		</tr>";
		}
		table_footer();
	?>
	<form method="post" action="export.php">
    	<input type="submit" name="export" class="btn btn-success" value="Exportar para Excel" />
    </form>
</div>

<?=template_footer()?>