<?php
	
	session_start();
	$nome = $_SESSION['nomeUsuario'];
		
	
	
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
						<div class="titulofuncoes">
							Bem-vindo, <?php echo ($nome); ?>
						</div>
						<div class="sair">
							<a href="../index.php"> SAIR </a>
						</div>
					</div>
				</nav>
			</div>
			<section id="conteudo">
				<div class="conteudousuarios">
					<a href="usuarioscadastrados.php" >
						<div class="iconedeusuarios">
							<div class="fotoicone">
								<img src="Imagens/adm.png">
							</div>
							<div class="tituloadm2">
								Usuarios 
							</div>
						</div>
					</a>
					<div class="iconedeusuarios">
						<a href="addnovousuario.php">
							<div class="fotoicone">
								<img src="Imagens/add.png">
							</div>
							<div class="tituloadm2">
								Adicionar novo usuário
							</div>
						</a>
					</div>
				</div>
			</section>
			<footer id="rodape">
				
			</footer>
		</div>
	</body>
</html>