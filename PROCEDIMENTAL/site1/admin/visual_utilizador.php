<?php
	$id = $_GET['id'];

	$sql = "SELECT * FROM utilizadores WHERE idutilizador = '$id' LIMIT 1";
	$resultado = mysqli_query($ligaDB, $sql);

	$row = mysqli_fetch_assoc($resultado);
?>
<div class="container theme-showcase" role="main">      
	<div class="page-header">
		<h1>Visualizar Utilizador</h1>
	</div>
	
	<div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=2&id=<?php echo $row['idutilizador']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
							
			<a href='administrativo.php?link=4&id=<?php echo $row['idutilizador']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='processa/proc_apagar_utilizador.php?id=<?php echo $row['idutilizador']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class=" col-sm-3 col-md-2">
				<b>Id:</b>
			</div>
			<div class=" col-sm-9 col-md-10">
				<?php echo $row['idutilizador']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Nome:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php echo $row['nome']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>E-mail:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php echo $row['email']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Utilizador:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php echo $row['login']; ?>
			</div>
			
			<div class="col-sm-3 col-md-2">
				<b>Nivel de Acesso:</b>
			</div>
			<div class="col-sm-9 col-md-10">
				<?php echo $row['nivel_acesso_id']; ?>
			</div>
		</div>
	</div>
</div> <!-- /container -->

