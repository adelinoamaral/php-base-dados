<?php
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM nivel_acessos WHERE idnivel_acesso = '$id' LIMIT 1";
	$resultado = mysqli_query($ligaDB, $sql);
	$row = mysqli_fetch_assoc($resultado);
?>
<div class="container" role="main">      
  <div class="page-header">
	<h1>Editar Nivel de Acesso</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=18'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
			
			<a href='processa/proc_apagar_nivel_acesso.php?id=<?php echo $row['idnivel_acesso']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_edit_nivel_acesso.php">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome_nivel" placeholder="Nome Completo" value="<?php echo $row['nome_nivel']; ?>">
			</div>
		  </div>		  
		  
		  <input type="hidden" name="id" value="<?php echo $row['idnivel_acesso']; ?>">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Guardar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

