<?php

$page_title = 'Visualização dos utilizadores registados';
include ('includes/header.php');

echo '<h3>Utilizadores Registados</h3>';

// Ligação à base de dados
require_once ('ligaDB.php');

$sql = "SELECT user_apelido, user_nome, DATE_FORMAT(user_dataregisto, '%d/%m/%Y') AS dr, user_id ";
$sql .= "FROM utilizadores ORDER BY user_dataregisto ASC";

if($result = $dbc->query($sql)){

	// verifica se há registos
	if($result->rowCount() > 0){

		// Mostra cabeçalho da tabela
		echo '<table>
			<tr>
				<td><b>Editar</b></td>
				<td><b>Eliminar</b></td>
				<td><b>Nome</b></td>
				<td><b>Apelido</b></td>
				<td><b>Data Registo</b></td>
			</tr>';
	
		while($row = $result->fetch(PDO::FETCH_OBJ)){
			echo '<tr>
				<td> <a href="edita_utilizador.php?id=' . $row->user_id . '">Editar</a></td>
				<td> <a href="apaga_utilizador.php?id=' . $row->user_id . '">Elimina</a></td>
                <td>' . $row->user_nome . '</td>
				<td>' . $row->user_apelido . '</td>
                <td>' . $row->dr . '</td>
			  </tr>';
		}
		echo '</table>'; // fecha a tabela.
	}else {
		echo "Não há utilizadores registados na base de dados!";
	}
}else{
	echo "Problemas com acesso à base de dados, tente mais tarde!";
}
	
// Liberta os registos poupando memória
unset($result);

include ('includes/footer.php');
?>
