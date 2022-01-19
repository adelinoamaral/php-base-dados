<?php
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM nivel_acessos WHERE idnivel_acesso = '$id' LIMIT 1";
	$resultado = mysqli_query($ligaDB, $sql);
	$row = mysqli_fetch_assoc($resultado);
?>
<div class="container" role="main">      
	<div class="page-header">
		<h1>Visualizar Nível Acesso</h1>
	</div>
	
	<div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=18&id=<?php echo $row['idnivel_acesso']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
							
			<a href='administrativo.php?link=21&id=<?php echo $row['idnivel_acesso']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href='processa/proc_apagar_nivel_acesso.php?id=<?php echo $row['idnivel_acesso']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class=" col-sm-3 col-md-1">
				<b>Id:</b>
			</div>
			<div class=" col-sm-9 col-md-11">
				<?php echo $row['idnivel_acesso']; ?>
			</div>
			
			<div class="col-sm-3 col-md-1">
				<b>Nome:</b>
			</div>
			<div class="col-sm-9 col-md-11">
				<?php echo $row['nome_nivel']; ?>
			</div>
		</div>
	</div>
</div> <!-- /container -->

