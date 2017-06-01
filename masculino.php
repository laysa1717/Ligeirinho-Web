<?php
	require_once('conecta.php');
?>
<html>
	<head>
		<title>Locais</title>
		<link rel="stylesheet" type="text/css" href="css/styleloja.css">
		 
	</head>
	<body>
		
		<header id="cabecalho">
			<div class="divauxcabecalho">
				<div class="logo">
					<img src="Imagens/logou.png">
				</div>
				<div class="menu" >
					<nav>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="#">Promoções</a>
								<ul class="submenu">
									<li><a class="a" href="feminino.php">Feminino</a></li>
									<li><a class="a" href="masculino.php">Masculino</a></li>
								</ul>
							</li>
							<li><a href="kits.php">Kits</a></li>
							<li><a href="corrida.php">Corrida de rua</a></li>
							<li><a href="noticia.php">Noticias</a></li>
							<li><a href="evento.php">Evento do mês</a></li>
							<li><a href="faleconosco.php">Fale conosco</a></li>
							
						<ul>
					</nav>
				</div>
				<div class="login">
					<form name="login" method="get" action="index.php">
						<table id="teste">
							<tr>
								<td>
									Usuario:
								</td>
								<td>
									Senha:
								</td>
							</tr>
							<tr>
								<td>
									<input value="" name="txtUsuario" type="text" size="15" >
								</td>
								<td>
									<input value="" name="txtsenha" type="password" size="15" >
								</td>
								<td>
									<input value="OK" name="txtUsuario" type="submit"  >
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</header>
		<section class="principal">
			
				<!-- Lateral -->
				
				<!-- Conteudo -->
				
				<div class="produtos">
					
					<?php
						
						$sql="select * from tbl_promocoes where id_promocoesEscolha = 2";
						$select = mysql_query($sql);
						
						while($rs=mysql_fetch_array($select)){
					
					?>
					<div class="conteudodiv">		
						<div class="imagensvendas">
							<img class="selectImagem"  src="CMS/<?php echo($rs['foto']);?>"/> 
						</div>
						<div class="titulodavenda">
							<?php echo($rs['titulo_promocoes']);?>
						</div>
						<div class="precodavenda">
							R$ <?php echo($rs['preco']); ?>
						</div>
						<div class="carrinhodecompra">
							<a href="#"><img src="Imagens/compra.png"></a>
						</div>
					</div>
					<?php
						}
					?>
				</div>
		</section>
			

		<footer class="rodape">
			<div class="controladorrodape">
				<div class="fotorodape">
					<div class="conteudorodapeesquerda">
						<table>
							<tr>
								<td class="titulorodape">
									SOBRE NÓS
								</td>
							</tr>
							<tr>
								<td class="conteudorodape">
									<ul>
										<li><a href="#">Quem somos</a></li>
										<li><a href="#">Biografia</a></li>
										<li><a href="#">Quem somos</a></li>
										<li><a href="#">Biografia</a></li>
									</ul>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="conteudorodapedireita">
						<div class="controlador">
							<div class="titulorodape">
								PESQUISAR
							</div>
							<div class="espacopesquisar">
								<input type="text" name="txtpesquisar" size="30">
							</div>
						</div>
						<div class="divrodape">
							<table>
								<tr>
									<td class="titulorodape">
										SOBRE NÓS
									</td>
								</tr>
								<tr>
									<td class="conteudorodape">
										<ul>
											<li><a href="#">Conteudo</a></li>
											<li><a href="#">Conteudo</a></li>
											<li><a href="#">Conteudo</a></li>
											<li><a href="#">Conteudo</a></li>
											<li><a href="#">Conteudo</a></li>
										</ul>
									</td>
								</tr>
							</table>
						</div>
						<div class="divrodape">
							<table>
								<tr>
									<td class="titulorodape">
										SOBRE NÓS
									</td>
								</tr>
								<tr>
									<td class="conteudorodape">
										<ul>
											<li><a href="#">Conteudo</a></li>
											<li><a href="#">Conteudo</a></li>
											<li><a href="#">Conteudo</a></li>
											<li><a href="#">Conteudo</a></li>
											<li><a href="#">Conteudo</a></li>
										</ul>
									</td>
								</tr>
							</table>
						</div>
					
				</div>
			</div>
			<div id="criador">
				Copyright© 2017- Laysa Santana 
			</div>
		<footer>
	</body>
	
</html>