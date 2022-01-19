
<div class="container" role="main">      
  <div class="page-header">
	<h1>Registar Categoria</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href='administrativo.php?link=7'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>				
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_reg_cat_prod.php">
	  
		  <div class="form-group">
			<label for="inputNome" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" id="inputNome" placeholder="Nome Categoria">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputSlug" class="col-sm-2 control-label">Slug</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="slug" placeholder="Nome da categoria tudo minúsculo" id="inputSlug">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputTag" class="col-sm-2 control-label">Palavra chave</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="tag" placeholder="Palavra chave" id="inputTag">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputDescription" class="col-sm-2 control-label">Descrição máximo 180 letras</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="description" placeholder="Descrição" id="inputDescription">
			</div>
		  </div>
		  
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-success">Registar</button>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

