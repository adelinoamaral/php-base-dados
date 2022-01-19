    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
		<h1>Contato</h1>
      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-6">
          <h2 class="featurette-heading">Contato por E-mail.</h2>
			<form class="form-horizontal" method="POST" action="processa/proc_cad_contato.php" enctype="multipart/form-data">
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Nome Completo*</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputEmail3" name="nome" placeholder="Preencher nome completo" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Email*</label>
				<div class="col-sm-10">
				  <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Telefone*</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputEmail3" name="telefone" placeholder="Telefone" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Assunto*</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputEmail3" name="assunto" placeholder="Assunto da mensagem" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Mensagem*</label>
				<div class="col-sm-10">
				  <textarea class="form-control" rows="3" name="mensagem"></textarea>
				</div>
			  </div>
			  
			  
			  
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <input type="submit" class="btn btn-success" value="Enviar">
				</div>
			  </div>
			</form>
        </div>
        <div class="col-md-6">
          <h2 class="featurette-heading">Contato por Telefone. </h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
      </div>

      <hr class="featurette-divider">
      <!-- /END THE FEATURETTES -->


      <footer>
        <p>&copy; Celke 2015</p>
      </footer>
    </div> <!-- /container -->


