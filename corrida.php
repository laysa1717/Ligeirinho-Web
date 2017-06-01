<!DOCTYPE html>
<?php

	require_once('conecta.php');
	
?>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="css/stylecorrida.css">
        
	</head>
	<body>
		<header id="cabecalho">
			<div class="divauxcabecalho">
				<div class="logo">
					<img src="Imagens/logou.png" alt="logo">
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
		                     
		<div class="principal1">
			<?php
				$sql="select * from tbl_corridaderua";
				
				$select = mysql_query($sql);
				while ($rs=mysql_fetch_array($select)){
			?>
			<div class="controladoraHistoria">
				<table>
					<tr>
						<td class="titulo">
							<?php	echo($rs['titulo']);	?>
						</td>
					</tr>
					<tr>
						<td class="">
							<table class="tabela">
								<tr>
									<td class="espaco">
										<?php echo($rs['texto']); ?>
									</td>
									<td class="espaco">
										As Corridas de Rua surgiram na Inglaterra no século XVIII 
										onde tornaram-se bastante popular, posteriormente, a modalidade expandiu-se para o resto da Europa e Estados Unidos. 
										No final do século XIX as Corridas de Rua ganharam impulso depois do grande sucesso da primeira Maratona 
										Olímpica popularizando-se particularmente nos Estados Unidos. 
										Depois, por volta de 1970, aconteceu o "jogging boom" baseado na teoria do médico norte-americano Kenneth 
										Cooper que difundiu seu famoso "Teste de Cooper", a partir de então, a prática da modalidade cresceu de maneira
										sem precedentes na história. 
										Paralelamente ainda na década de 70 surgiram provas onde era permitida a participação popular
										junto com os corredores de elite – cada grupo largando nos respectivos pelotões. 

										Atualmente, o critério da Federação Internacional das Associações de Atletismo (IAAF) define as 
										Corridas de Rua, provas de pedestreanismo, como disputadas em circuitos de rua (ruas, avenidas, estradas) com distâncias 
										oficiais variando de 5 Km a 100 Km. 
										Hoje as Corridas de Rua são bem populares em todo o mundo. São praticadas em sua grande maioria por atletas
										amadores que buscam melhorar e aumentar sua qualidade de vida através da prática esportiva. Na última década, houve um
										aumento significativo do número de praticantes, tanto no mundo como no Brasil. 
									</td>
									<td class="espaco" >
										As Corridas de Rua surgiram na Inglaterra no século XVIII 
										onde tornaram-se bastante popular, posteriormente, a modalidade expandiu-se para o resto da Europa e Estados Unidos. 
										No final do século XIX as Corridas de Rua ganharam impulso depois do grande sucesso da primeira Maratona 
										Olímpica popularizando-se particularmente nos Estados Unidos. 
										Depois, por volta de 1970, aconteceu o "jogging boom" baseado na teoria do médico norte-americano Kenneth 
										Cooper que difundiu seu famoso "Teste de Cooper", a partir de então, a prática da modalidade cresceu de maneira
										sem precedentes na história. 
										Paralelamente ainda na década de 70 surgiram provas onde era permitida a participação popular
										junto com os corredores de elite – cada grupo largando nos respectivos pelotões. 

										Atualmente, o critério da Federação Internacional das Associações de Atletismo (IAAF) define as 
										Corridas de Rua, provas de pedestreanismo, como disputadas em circuitos de rua (ruas, avenidas, estradas) com distâncias 
										oficiais variando de 5 Km a 100 Km. 
										Hoje as Corridas de Rua são bem populares em todo o mundo. São praticadas em sua grande maioria por atletas
										amadores que buscam melhorar e aumentar sua qualidade de vida através da prática esportiva. Na última década, houve um
										aumento significativo do número de praticantes, tanto no mundo como no Brasil. 
									</td>
								</tr>
							</table>
						</td>	
					</tr>
					
					</tr>
				</table>
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