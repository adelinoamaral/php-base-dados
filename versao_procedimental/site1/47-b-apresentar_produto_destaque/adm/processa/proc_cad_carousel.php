<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>
	
		<?php
		include_once("../seguranca.php");
		include_once("../conexao.php");
		$nome 				= $_POST["nome"];
		$url			 	= $_POST["url"];
		$arquivo	 		= $_FILES['arquivo']['name'];
		
		//varialvel para controlar a ordem da inserção
		$controle_salvou = 0;
		$controle_ordem = 1;
		$inseriu = 0;
		
		if($controle_salvou == 0){
			$resultado_prod_dest=mysql_query("SELECT * FROM carousels ORDER BY ordem ASC");
			$linhas_prod_dest=mysql_num_rows($resultado_prod_dest);
			while($linhas_prod_dest = mysql_fetch_array($resultado_prod_dest)){
				if($linhas_prod_dest['ordem'] != $controle_ordem){
					//inicio Inserção 		
					
					
					
					//Pasta onde o arquivo vai ser salvo
					$_UP['pasta'] = '../../imagens/';

					//Tamanho máximo do arquivo em Bytes
					$_UP['tamanho'] = 1024*1024*100; //5mb

					//Array com as extensoes permitidas
					$_UP['extensoes'] = array('png','jpg', 'jpeg', 'gif');

					//Renomeia o arquivo? (se true, o arquivo será salvo como .jpg e em nome único)
					$_UP['renomeia'] = false;

					//Array com os tipos de erros de upload do PHP
					$_UP['erros'][0] = 'Não houve erro';
					$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
					$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
					$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
					$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

					//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
					if($_FILES['arquivo']['error'] != 0){
						die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
						exit; //Para a execução do script
					}

					//Faz a verificação da extensao do arquivo
					$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
					if(array_search($extensao, $_UP['extensoes'])=== false){
						$query = mysql_query("INSERT INTO carousels (
						nome, 			
						url, 
						ordem,
						created) VALUES(
						'$nome',
						'$url',
						'$controle_ordem',
						NOW())");
						echo "
							<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=25'>
							<script type=\"text/javascript\">
								alert(\"A imagem não foi cadastrada for favor, envie arquivos com as seguintes extensões: png, jpg, jpeg e gif. As informações do produto foi cadastrado.\");
							</script>
						";
					}
					//Faz a verificação do tamanho do arquivo
					else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
						echo "";
						$query = mysql_query("INSERT INTO carousels (
						nome, 			
						url,	
						ordem,
						created) VALUES(
						'$nome',
						'$url',
						'$controle_ordem',
						NOW())");
						echo "
							<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=25'>
							<script type=\"text/javascript\">
								alert(\"O arquivo enviado é muito grande, envie arquivos de até 2mb. As informações do produto foi cadastrado.\");
							</script>
						";
					}

					//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto

					else{
						//Primeiro verifica se deve trocar o nome do arquivo
						if($UP['renomeia'] == true){
							//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
							$nome_final = time().'.jpg';
						}else{
							//mantem o nome original do arquivo
							$nome_final = $_FILES['arquivo']['name'];
						}
						//Verificar se é possivel mover o arquivo para a pasta escolhida
						if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
							//Upload efetuado com sucesso, exibe a mensagem
							$query = mysql_query("INSERT INTO carousels (
							nome, 			
							url,	
							imagem, 
							ordem,							
							created) VALUES(
							'$nome',
							'$url',
							'$nome_final',
							'$controle_ordem',
							NOW())");
							echo "
								<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=25'>
								<script type=\"text/javascript\">
									alert(\"Imagem cadatrada com Sucesso.\");
								</script>
							";	
						}else{
							//Upload não efetuado com sucesso, exibe a mensagem
							echo "
								<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=25'>
								<script type=\"text/javascript\">
									alert(\"Imagem não foi cadatrada com Sucesso.\");
								</script>
							";
						}
					}
					
					
					//Fim inserção
					$inseriu = 1;
					$controle_ordem = $controle_ordem + 1;
				}
				$controle_ordem = $controle_ordem + 1;
			}
		}if($inseriu == 0){
			//inicio Inserção 		
					
					
					
			//Pasta onde o arquivo vai ser salvo
			$_UP['pasta'] = '../../imagens/';

			//Tamanho máximo do arquivo em Bytes
			$_UP['tamanho'] = 1024*1024*100; //5mb

			//Array com as extensoes permitidas
			$_UP['extensoes'] = array('png','jpg', 'jpeg', 'gif');

			//Renomeia o arquivo? (se true, o arquivo será salvo como .jpg e em nome único)
			$_UP['renomeia'] = false;

			//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

			//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
			if($_FILES['arquivo']['error'] != 0){
				die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
				exit; //Para a execução do script
			}

			//Faz a verificação da extensao do arquivo
			$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
			if(array_search($extensao, $_UP['extensoes'])=== false){
				$query = mysql_query("INSERT INTO carousels (
				nome, 			
				url, 
				ordem,
				created) VALUES(
				'$nome',
				'$url',
				'$controle_ordem',
				NOW())");
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=25'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada for favor, envie arquivos com as seguintes extensões: png, jpg, jpeg e gif. As informações do produto foi cadastrado.\");
					</script>
				";
			}
			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
				echo "";
				$query = mysql_query("INSERT INTO carousels (
				nome, 			
				url,	
				ordem,
				created) VALUES(
				'$nome',
				'$url',
				'$controle_ordem',
				NOW())");
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=25'>
					<script type=\"text/javascript\">
						alert(\"O arquivo enviado é muito grande, envie arquivos de até 2mb. As informações do produto foi cadastrado.\");
					</script>
				";
			}

			//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto

			else{
				//Primeiro verifica se deve trocar o nome do arquivo
				if($UP['renomeia'] == true){
					//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
					$nome_final = time().'.jpg';
				}else{
					//mantem o nome original do arquivo
					$nome_final = $_FILES['arquivo']['name'];
				}
				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
					//Upload efetuado com sucesso, exibe a mensagem
					$query = mysql_query("INSERT INTO carousels (
					nome, 			
					url,	
					imagem, 
					ordem,							
					created) VALUES(
					'$nome',
					'$url',
					'$nome_final',
					'$controle_ordem',
					NOW())");
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=25'>
						<script type=\"text/javascript\">
							alert(\"Imagem cadatrada com Sucesso.\");
						</script>
					";	
				}else{
					//Upload não efetuado com sucesso, exibe a mensagem
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/adm/administrativo.php?link=25'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadatrada com Sucesso.\");
						</script>
					";
				}
			}
			
			
			//Fim inserção
		}
	
		?>
	</body>
</html>