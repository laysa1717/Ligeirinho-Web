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
				<a href="crudhome.php">
					<div class="divCont">
						<div class="fotoCont">
							<img src="Imagens/home.png">
						</div>
						<div class="tituloCont">
							Home Page
						</div>
					</div>
				</a>
				<a href="crudpromocoes.php">
					<div class="divCont">
						<div class="fotoCont">
							<img src="Imagens/desconto.png">
						</div>
						<div class="tituloCont">
							Promoções
						</div>
					</div>
				</a>
				<a href="crudkits.php">
					<div class="divCont">
						<div class="fotoCont">
							<img src="Imagens/kit.png">
						</div>
						<div class="tituloCont">
							Kits
						</div>
					</div>
				</a>
				<a href="crudcorrida.php">
					<div class="divCont">
						<div class="fotoCont">
							<img src="Imagens/corrida.png">
						</div>
						<div class="tituloCont">
							Corrida de Rua
						</div>
					</div>
				</a>
				<a href="crudnoticias.php">
					<div class="divCont">
						<div class="fotoCont">
							<img src="Imagens/noticia.png">
						</div>
						<div class="tituloCont">
							Noticias
						</div>
					</div>
				</a>
				<a href="crudevento.php">
					<div class="divCont">
						<div class="fotoCont">
							<img src="Imagens/evento.png">
						</div>
						<div class="tituloCont">
							Evento do mês
						</div>
					</div>
				</a>
			</section>
			<footer id="rodape">
			
			</footer>
		</div>
	</body>
</html>