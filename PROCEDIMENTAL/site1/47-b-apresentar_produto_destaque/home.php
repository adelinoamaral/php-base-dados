<?php
	
	$resultado=mysql_query("SELECT * FROM carousels ORDER BY ordem asc LIMIT 3");
	$linhas=mysql_num_rows($resultado);
	$contr_sob = $linhas;
?>	
	<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
		<?php 
		$controle = 1;
		while($linhas = mysql_fetch_array($resultado)){
			$imagem = pg.'/imagens/'.$linhas['imagem']; 
			
			if($controle == 1){ ?>
				<div class="item active">
					<a href="<?php echo $linhas['url'];?>"><img class="first-slide" src="<?php echo $imagem;?>" alt="First slide"></a>
				</div>
			<?php }elseif($controle == 2){?>
				<div class="item">
					<a href="<?php echo $linhas['url'];?>"><img class="second-slide" src="<?php echo $imagem;?>" alt="First slide"></a>
				</div>
			<?php }elseif($controle == 3){?>
				<div class="item">
					<a href="<?php echo $linhas['url'];?>"><img class="third-slide" src="<?php echo $imagem;?>" alt="First slide"></a>
				</div>
			<?php }
			$controle = $controle + 1;
		} ?>
      </div>
      
    </div><!-- /.carousel -->
	
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
	<?php
	//Pesquisar o id dos produtos em destaque no nivel 1 página principal
	$resultado_prod_dest=mysql_query("SELECT * FROM destaques_produtos WHERE nivel_um='1' ORDER BY ordem ASC");
	$linhas_prod_dest=mysql_num_rows($resultado_prod_dest);
	
	?>
    <div class="container marketing">
		<h1>Produtos em destaque</h1>
      <!-- Three columns of text below the carousel -->
      <div class="row">
		<?php 
			while($linhas_prod_dest = mysql_fetch_array($resultado_prod_dest)){ 
				//id do produto na tabela produto em destaque
				$produto_id = $linhas_prod_dest['produto_id'];
				$produto_dest_id = $linhas_prod_dest['id'];
				
				//Selecionar os dados do produto no BD
				$resultado_prod=mysql_query("SELECT * FROM produtos WHERE id='$produto_id' LIMIT 1");
				$linhas_prod=mysql_fetch_assoc($resultado_prod);
				$imagem = pg.'/foto/'.$linhas_prod['imagem']; 
				?>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
				  <img class="img-circle" src="<?php echo $imagem; ?>" alt="Generic placeholder image" width="140" height="140">
				  <h2><?php echo $linhas_prod['nome']; ?></h2>
				  <p><?php echo $linhas_prod['descricao_curta']; ?></p>
				  <p><a class="btn btn-default" href="<?php echo pg.'/detalhe_produto/'.$linhas_prod['id'].'/'.$linhas_prod['slug']; ?>" role="button">Mais detalhes &raquo;</a></p>
				</div><!-- /.col-lg-4 -->   
			<?php } ?>
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">
		<?php
		//Pesquisar o id dos produtos em destaque no nivel 1 página principal
		$resultado_prod_dest=mysql_query("SELECT * FROM destaques_produtos WHERE nivel_dois='1' ORDER BY ordem ASC LIMIT 3");
		$linhas_prod_dest=mysql_num_rows($resultado_prod_dest);
		
		?>
		<?php 
		//imprime produtos lista baixa destaque
		$controle = 0;	
		while($linhas_prod_dest = mysql_fetch_array($resultado_prod_dest)){ 
			//id do produto na tabela produto em destaque
			$produto_id = $linhas_prod_dest['produto_id'];
			$produto_dest_id = $linhas_prod_dest['id'];
			
			//Selecionar os dados do produto no BD
			$resultado_prod=mysql_query("SELECT * FROM produtos WHERE id='$produto_id' LIMIT 1");
			$linhas_prod=mysql_fetch_assoc($resultado_prod);
			$imagem = pg.'/foto/'.$linhas_prod['imagem']; 
					
			  if($controle == 0){
					?>
				  <div class="row featurette">
					<div class="col-md-7">
					  <h2 class="featurette-heading"><?php echo $linhas_prod['nome']; ?></h2>
					  <p class="lead"><?php echo $linhas_prod['descricao_curta']; ?></p>
					</div>
					<div class="col-md-5">
					  <img class="featurette-image img-responsive center-block" src="<?php echo $imagem; ?>" alt="Generic placeholder image">
					</div>
				  </div>

					<hr class="featurette-divider">
					<?php $controle = 1; 
				}else{ ?>
					<div class="row featurette">
						<div class="col-md-7 col-md-push-5">
							<h2 class="featurette-heading"><?php echo $linhas_prod['nome']; ?></h2>
							<p class="lead"><?php echo $linhas_prod['descricao_curta']; ?></p> 
						</div>
						<div class="col-md-5 col-md-pull-7">
						  <img class="featurette-image img-responsive center-block" src="<?php echo $imagem; ?>" alt="Generic placeholder image">
						</div>
					  </div>
					<hr class="featurette-divider">
				<?php $controle = 0; 
				} ?>
			 <?php } ?>

           

      <!-- /END THE FEATURETTES -->


      <footer>
        <p>&copy; Celke 2015</p>
      </footer>
    </div> <!-- /container -->

