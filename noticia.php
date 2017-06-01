<!DOCTYPE html>

<?php
	require_once('conecta.php');
?>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="css/stylenoticia.css">
	</head>
	<body>
		<header id="cabecalho">
			<div class="divauxcabecalho">
				<!-- Logo tipo do site-->
				<div class="logo">
					<img src="Imagens/logou.png" alt="logo">
				</div>
				<!-- Menu do site -->
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
							
						</ul>
					</nav>
				</div>
				<!--  area do login do site -->
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
								<td>
									
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
		                     
		<div class="principal1">
		<?php
			
			$sql = "select * from tbl_noticia where atde = 1";
			$select = mysql_query($sql);
			while($rs=mysql_fetch_array($select)){
		?>
			<div class="controladoradoconteudo">
				<div class="primeiraParteDoConteudo">
					<div class="foto">
						<img class="foto"  src="CMS/<?php echo($rs['foto1']);?>"/> 
					</div>
					<div>
						<div class="titulonoticia">
							<?php echo($rs['titulo']); ?>
						</div>
						<div class="conteudonoticia">
							<?php echo($rs['texto']); ?>
							
						</div>
					</div>
				</div>
				<div class="segundaParteDoConteudo">
					<div class="fotinha">
						<img class="fotinha"  src="CMS/<?php echo($rs['foto2']);?>"/> 
					</div>
					<div class="fotinha">
						<img class="fotinha"  src="CMS/<?php echo($rs['foto3']);?>"/> 
					</div>
					<div class="fotinha">
						<img class="fotinha"  src="CMS/<?php echo($rs['foto4']);?>"/> 
					</div>
					<div class="fotinha">
						<img class="fotinha"  src="CMS/<?php echo($rs['foto5']);?>"/> 
					</div>
				</div>
			</div>
			<?php
			}
			?>
			
		</div>
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
		</footer>
		
	</body>
</html>