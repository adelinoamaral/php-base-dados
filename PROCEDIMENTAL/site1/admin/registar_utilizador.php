
<div class="container" role="main">      
	<div class="page-header">
		<h1>Registar Utilizador</h1>
	</div>
	<div class="row">
		<div class="col-md-1 pull-right espaco">
			<a href='administrativo.php?link=2'>
				<button type='button' class='btn btn-md btn-info'>Listar</button>
			</a>				
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method="POST" action="processa/proc_registo_utilizado.php">

				<div class="form-group">
					<label for="inputNome" class="col-md-2 control-label">Nome</label>
					<div class="col-md-10">
						<input type="text" class="form-control" name="nome" id="inputNome" placeholder="Nome Completo...">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail" class="col-md-2 control-label">E-mail</label>
					<div class="col-md-10">
						<input type="email" class="form-control" name="email" id="inputEmail" placeholder="E-mail...">
					</div>
				</div>

				<div class="form-group">
					<label for="inputUtilizador" class="col-md-2 control-label">Utilizador</label>
					<div class="col-md-10">
						<input type="text" class="form-control" name="utilizador" id="inputUtilizador" placeholder="Utilizador ...">
					</div>
				</div>

				<div class="form-group">
					<label for="inputPassword" class="col-md-2 control-label">Senha</label>
					<div class="col-md-10">
						<input type="password" class="form-control" name="senha" id="inputPassword" placeholder="Senha">
					</div>
				</div>

				<div class="form-group">
					<label for="inputControlo" class="col-md-2 control-label">Nivel de Acesso</label>
					<div class="col-md-10">
						<select class="form-control" name="nivel_de_acesso" id="inputControlo">
						<option value="1">Administrativo</option>
						<option value="2">Utilizador</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">
						<button type="submit" class="btn btn-success">Registar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div> <!-- /container -->

