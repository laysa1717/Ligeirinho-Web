<?php

	/*Colocando na pagina as variaveis de sessões */
	session_start();
	$nome = $_SESSION['nomeUsuario'];
	$email = $_SESSION['emailUsuario'];
	$funcao = $_SESSION['funcaoUsuario'];
	$profissao = $_SESSION['profissaoUsuario'];
	
	
	
		
	
	
?>

<html>
	<head>
		<title>Administração</title>
		<link rel="stylesheet" type="text/css" href="css/styleadm.css">
	</head>
	<body>
		<div class="principal">
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
					<div class="esquerda" >
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
								Bem-vindo, <?php echo ($nome); ?>
							</div>
							<div class="sair">
								<a href="../index.php"> SAIR </a>
							</div>
						</a>
					</div>
				</nav>
			</div>
			<section id="conteudo">
				<div class="bemvindo">
					<div class="fotousuario">
						<div class="foto">
							<div class="fotoicone">
								<img src="Imagens/adm.png">
							</div>
						</div>
						<div class="nomeuser">
							Bem-vindo, <?php echo ($nome); ?>
						</div>
					</div>
					<div class="informacoesusuario">
						<table>
							<tr>
								<td class="td2">
									Nome: <?php echo ($nome); ?>
								</td>
							</tr>
							<tr>
								<td class="td2">
									Email: <?php echo ($email); ?>
								</td>
							</tr>
							<tr>
								<td class="td2">
									Função: <?php 
											
										if ($funcao == 1){
											echo ("Administrador");
										}else{
											echo("Funcionário");
											
										}
									?>
								</td>
							</tr>
							<tr>
								<td class="td2">
									Profissão:  <?php echo ($profissao); ?>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</section>
			<footer id="rodape">
			
			</footer>
		</div>
	</body>
</html>