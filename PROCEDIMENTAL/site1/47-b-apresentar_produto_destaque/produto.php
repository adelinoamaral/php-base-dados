<?php
	//recuperar o id passado pela url
	$url = (isset($_GET['url'])) ? $_GET['url']:'';	
	$explode = explode('/',$url);
	$categoria = $explode[1];
	
	//Consultar a categoria conforme o id
	$resultado_cat=mysql_query("SELECT * FROM categorias WHERE id='$categoria' LIMIT 1");
	$linhas_cat=mysql_fetch_assoc($resultado_cat);
	
	//Consultar os produtos conforme a categoria
	$resultado_prod=mysql_query("SELECT * FROM produtos WHERE categoria_id='$categoria' ORDER BY 'id'");
	$linhas_prod=mysql_num_rows($resultado_prod);
	
?>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
		<h1><?php echo $linhas_cat['nome']; ?></h1>
      <!-- Three columns of text below the carousel -->
      <div class="row">
		<?php 
			while($linhas_prod = mysql_fetch_array($resultado_prod)){
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
		<?php
			//Consultar os produtos conforme a categoria
			$resultado_prod_baix=mysql_query("SELECT * FROM produtos WHERE categoria_id='$categoria' ORDER BY 'id' LIMIT 3");
			$linhas_prod_baix=mysql_num_rows($resultado_prod_baix);
		?>
      <hr class="featurette-divider">
		<?php 
		//imprime produtos lista baixa destaque
		$controle = 0;
		while($linhas_prod = mysql_fetch_array($resultado_prod_baix)){
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


