<?php
	$sql = "SELECT * FROM nivel_acessos ORDER BY 'idnivel_acesso'";
	$resultado=mysqli_query($ligaDB, $sql);
	$linhas=mysqli_num_rows($resultado);
?>	
<div class="container" role="main">      
  <div class="page-header">
	<h1>Lista de Nivel de Acesso</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=19"><button type='button' class='btn btn-sm btn-success'>Registar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Nome</th>			
			<th>Ações</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				while($linhas = mysqli_fetch_array($resultado)){
					echo "<tr>";
						echo "<td>".$linhas['idnivel_acesso']."</td>";
						echo "<td>".$linhas['nome_nivel']."</td>";
						
						?>
						<td> 
						<a href='administrativo.php?link=20&id=<?php echo $linhas['idnivel_acesso']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>
						
						<a href='administrativo.php?link=21&id=<?php echo $linhas['idnivel_acesso']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
						
						<a href='processa/proc_apagar_nivel_acesso.php?id=<?php echo $linhas['idnivel_acesso']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

