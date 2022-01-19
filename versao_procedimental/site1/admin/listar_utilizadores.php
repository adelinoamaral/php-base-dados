<?php
	include_once("ligacao.php");
	$sql = "SELECT * FROM utilizadores ORDER BY 'idutilizador'";
	//$sql = "SELECT * FROM utilizadores ORDER BY idutilizador";
	$resultado = mysqli_query($ligaDB, $sql);

	$linhas = mysqli_num_rows($resultado);	// ???????????????????

?>

<div class="container">      
	<div class="page-header">
		<h1>Listagem de Utilizadores</h1>
	</div>
	<div class="row">
		<div class="pull-right">
			<a href="administrativo.php?link=3">
				<button type='button' class='btn btn-sm btn-success'>Registar</button>
			</a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Nivel de Acesso</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					while($linhas = mysqli_fetch_array($resultado)){
						echo "<tr>";
						echo "<td>".$linhas['idutilizador']."</td>";
						echo "<td>".$linhas['nome']."</td>";
						echo "<td>".$linhas['email']."</td>";
						echo "<td>".$linhas['nivel_acesso_id']."</td>";
					?>
						<td> 
						<!-- idutilizador serve para visualizar a informação do utilizador  -->
						<a href='administrativo.php?link=5&id=<?php echo $linhas['idutilizador']; ?>'>
							<button type='button' class='btn btn-sm btn-primary'>Visualizar</button>
						</a>

						<a href='administrativo.php?link=4&id=<?php echo $linhas['idutilizador']; ?>'>
							<button type='button' class='btn btn-sm btn-warning'>Editar</button>
						</a>

						<a href='processa/proc_apagar_utilizador.php?id=<?php echo $linhas['idutilizador']; ?>'>
							<button type='button' class='btn btn-sm btn-danger'>Apagar</button>
						</a>

					<?php
						echo "</tr>";
					}	// ./while
					?>
				</tbody>
			</table>
		</div>
	</div>
</div> <!-- /container -->