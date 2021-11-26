<!-- definição do menu -->
 <nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			</button>
			<a class="navbar-brand" href="#">Loja</a>
		</div>
		
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo PH.'/home' ?>">Home</a></li>
				<li class="dropdown">
					<a href="produto.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					Produtos </a>
					<ul class="dropdown-menu">
						<li><a href="#">HTML</a></li>
						<li><a href="#">CSS</a></li>
						<li><a href="#">JavaScript</a></li>
					</ul>
				</li> <!-- ./dropdown -->
				<li><a href="<?php echo PH.'/empresa' ?>">Empresa</a></li>
				<li><a href="<?php echo PH.'/contacto' ?>">Contacto</a></li> 
			</ul>			
						
												
		</div> <!-- .navbar-collapse -->
	
	</div> <!-- ./container -->
</nav>