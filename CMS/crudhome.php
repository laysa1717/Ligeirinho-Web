<?php
	
	session_start();
	$nome = $_SESSION['nomeUsuario'];
	
	$tituloCorrida = null;
	$data = null;
	$preco = null;
	$local = null;
	$horario = null;
	
	
	require_once('../conecta.php');

	
	
	
	
?>

<html>
	<head>
		<title>Administração</title>
		<link rel="stylesheet" type="text/css" href="css/styleadm.css">
	</head>
	<body>
		<div class="principal1">
			<header id="cabecalho">
				<div class="tituloadm">
					CMS - Sistema de Gerenciamento de Site
				</div>
				<div class="logoadm">
					<img src="Imagens/logou.png">
				</div>
			</header>
			<div id="menu">
				<nav >
					<div class="esquerda1" >
						<div class="funcoes">
							<a href="admconteudo.php">
								<div class="icone">
									<img src="Imagens/conteudo.png">
								</div>
								<div class="titulofuncoes">
									ADM de conteudo
								</div>
							</a>
						</div>
						<div class="funcoes">
							<a href="admfale.php">
								<div class="icone">
									<img src="Imagens/contato.png">
								</div>
								<div class="titulofuncoes">
									ADM Fale Conosco
								</div>
							</a>
						</div>
						<div class="funcoes">
							<a href="admproduto.php">
								<div class="icone">
									<img src="Imagens/produto.png">
								</div>
								<div class="titulofuncoes">
									ADM Produtos
								</div>
							</a>
						</div>
						<div class="funcoes">
							<a href="admusuario.php">
								<div class="icone">
									<img src="Imagens/usuario.png">
								</div>
								<div class="titulofuncoes">
									ADM Usuários
								</div>
							</a>
						</div>
					</div>
					<div class="direita">
						<a href="index.php"> 
							<div class="titulofuncoes">
								Bem-vindo <?php echo($nome); ?>
							</div>
							<div class="sair">
								<a href="../index.php"> SAIR </a>
							</div>
						</a>
					</div>
				</nav>
			</div>
			<section id="conteudo1home">
				<div class="titulonovousuario">
					Home Page
				</div>
				<div class="principalHome">
					<div>
						<form name="frmhome" method="POST" action="crudhome.php">
							<table>
								<tr>
									<td class="td">
										Titulo da Corrida:
									</td>
									<td>
										<input class="input" name="txttitulo"  type="text" size="30">
									</td>
								</tr>
								<tr>
									<td class="td">
										Data corrida:
									</td>
									<td>
										<input class="input" name="txtdata" value="" type="text" size="30">
									</td>
								</tr>
								<tr>
									<td class="td">
										Preço:
									</td>
									<td>
										<input class="input" name="txtpreco" value="" type="text" size="30">
									</td>
								</tr>
								<tr>
									<td class="td">
										Local:
									</td>
									<td>
										<input class="input" name="txtlocal" value="" type="text" size="30">
									</td>
								</tr>
								<tr>
									<td class="td">
										Horario:
									</td>
									<td>
										<input class="input" name="txthorario" value="" type="text" size="30">
									</td>
								</tr>
								<tr>
									<td class="td">
										Foto corrida:
									</td>
									<td>
										<input  name="flefotos" type="file">
									</td>
								</tr>
								<tr>
									<td>
									
									</td>
									<td class="td">
										<input value="Salvar" name="btn_salvar" type="submit">
									</td>
								</tr>
							</table>
					</div>
				</div>
				<div class="selectHome">
					<table>
						<tr>
							<td class="td10home">
								Titulo
							</td>
							<td class="td10home">
								Data
							</td>
							<td class="td10home">
								Preço
							</td>
							<td class="td10home">
								Local
							</td>
							<td class="td10home">
								Horario
							</td>
							<td class="td10home">
								Foto
							</td>
						</tr>
						<tr>
							<td class="td10home">
								
							</td>
							<td class="td10home">
								
							</td>
							<td class="td10home">
								
							</td>
							<td class="td10home">
							
							</td>
							<td class="td10home">
								
							</td>
							<td class="td10home">
								
							</td>
						</tr>
						<tr>
							<td class="td10home">
								Titulo
							</td>
							<td class="td10home">
								Data
							</td>
							<td class="td10home">
								Preço
							</td>
							<td class="td10home">
								Local
							</td>
							<td class="td10home">
								Horario
							</td>
							<td class="td10home">
								Foto
							</td>
							<td class="td10home">
								<a href="crudhome.php?modo=excluir&codigo=<?php echo($rs['idProduto']);?>">
								<img src="Imagens/excluir.png">
								</a>
								<a href="crudhome.php?modo=editar&codigo=<?php echo($rs['idProduto']);?>">
								<img src="Imagens/editar.png">
								</a>
							</td>
							
						</tr>
					</table>
					</form>
				</div>
			</section>
			<footer id="rodape">
				
			</footer>
		</div>
	</body>
</html>