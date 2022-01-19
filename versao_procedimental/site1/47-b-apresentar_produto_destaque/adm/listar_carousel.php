
<?php
	
	$resultado=mysql_query("SELECT * FROM carousels ORDER BY ordem asc");
	$linhas=mysql_num_rows($resultado);
	$contr_sob = $linhas;
?>	
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Lista de Carousel</h1>
  </div>
  <div class="row espaco">
		<div class="pull-right">
			<a href="administrativo.php?link=24"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
		</div>
	</div>
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Ordem</th>
			 <th>Ações</th>
		  </tr>
		</thead>
		<tbody>
			<?php 
				$contr_ord = 1;
				while($linhas = mysql_fetch_array($resultado)){					
					$carousel_id = $linhas['id'];
					echo "<tr>";
						echo "<td>".$linhas['id']."</td>";
						echo "<td>".$linhas['nome']."</td>";
						echo "<td>".$linhas['ordem']."</td>";
						?>
						<td> 
						<?php if($contr_sob != $contr_ord){ ?>
							<a href='processa/proc_edit_ordem_carousel.php?situacao=1&id=<?php echo $carousel_id; ?>'><button type='button' class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></button></a>
						<?php }else{ ?>	
							<a href='#'><button type='button' class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></button></a>
						<?php } ?>
						<?php if($contr_ord != 1){ ?>
							<a href='processa/proc_edit_ordem_carousel.php?situacao=2&id=<?php echo $carousel_id; ?>'><button type='button' class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></button></a>		
						<?php }else{ ?>	
							<a href='#'><button type='button' class='btn btn-sm btn-primary'><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></button></a>
						<?php } ?>	
						<a href='processa/proc_edit_ordem_carousel.php?situacao=3&id=<?php echo $carousel_id; ?>'><button type='button' class='btn btn-sm btn-danger'>Retirar</button></a>
						
						<?php
					echo "</tr>";
					$contr_ord = $contr_ord + 1; 
				}
			?>
		</tbody>
	  </table>
	</div>
	</div>
</div> <!-- /container -->

