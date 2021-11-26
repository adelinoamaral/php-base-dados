<?php
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM categorias WHERE idcategoria = '$id' LIMIT 1";
	$resultado = mysqli_query($ligaDB, $sql);
	$row = mysqli_fetch_assoc($resultado);
?>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Editar Categoria</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=7'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
			
			<a href='processa/proc_apagar_cat_prod.php?id=<?php echo $row['idcategoria']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_edit_cat_prod.php">
	  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome Completo" value="<?php echo $row['nome']; ?>">
			</div>
		  </div>		 

			<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Slug</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="slug" placeholder="Nome da categoria tudo minusculo" value="<?php echo $row['slug']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Palavra chave</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="tag" placeholder="Palavra chave" value="<?php echo $row['tag']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição máximo 180 letras</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="description" placeholder="Descrição" value="<?php echo $row['description']; ?>">
			</div>
		  </div>
		  
		  <input type="hidden" name="id" value="<?php echo $row['idcategoria']; ?>">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Editar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

