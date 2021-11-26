
<?php
	
	$resultado=mysql_query("SELECT * FROM categorias ORDER BY 'id'");
	$linhas=mysql_num_rows($resultado);
?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Lista de Categoria</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=6"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
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
				while($linhas = mysql_fetch_array($resultado)){
					echo "<tr>";
						echo "<td>".$linhas['id']."</td>";
						echo "<td>".$linhas['nome']."</td>";
						
						?>
						<td> 
						<a href='administrativo.php?link=8&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>
						
						<a href='administrativo.php?link=9&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
						
						<a href='processa/proc_apagar_cat_prod.php?id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
						
						<?php
					echo "</tr>";
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

