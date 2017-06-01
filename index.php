<?php
	
	session_start(); 

	if(isset($_POST['btnOK'])){
		
			require_once('conecta.php');
			
			
			$login = ($_POST["txtlogin"]);
			$_SESSION['txtlogin'] = $login;
			$senha = ($_POST["txtsenha"]);
			
			$result = mysql_query( 'select * from tbl_usuario where login="'.$login.'" and senha="'.$senha.'"');
			
			
			if(mysql_num_rows($result) > 0){
				$rs= mysql_fetch_row($result);
				

				$_SESSION['nomeUsuario'] = $rs[1];
				$_SESSION['emailUsuario'] = $rs[4];
				$_SESSION['profissaoUsuario'] = $rs[6];
				$_SESSION['funcaoUsuario'] = $rs[8];
				

				
				
				header ('Location: cms/adm.php');
			}else{
				?> <script>alert("USUARIO OU SENHA INCORRETOS");</script> <?php
			}
		}
	

	
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
        
	</head>
	<body>
		<!-- Começo do cabelho onde fica o menu, o logo e a area do login -->
		<header id="cabecalho">
			<div class="divauxcabecalho">
				<div class="objetooculto">
					
				</div>
				<!-- Logo tipo do site-->
				<div class="logo">
					<img class="logo3" src="Imagens/logou.png" alt="logo">
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
					<form name="login" method="post" >
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
									<input value="" name="txtlogin" type="text" size="15" >
								</td>
								<td>
									<input value="" name="txtsenha" type="password" size="15" >
								</td>
								<td>
									<input value="OK" name="btnOK" type="submit"  >
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</header>
		<!-- Div principal e controladora de tudo-->
		<div class="principal">
			<section>
				<h6>
					jfndsja
				</h6>
				<!-- Lateral para dar o espaço -->
				<div class="separador">
				
				</div >
				<!-- Conteudo -->
				<div class="separadorconteudo">
					<!-- O slide começa aqui -->
					<div class="espacoproslide">
						<div class="container"> 
                            <figure>
                                <div class="slide">
                                    <img src="Imagens/img1.jpg" alt="slide">
                                </div>
                                <div class="slide">
                                    <img src="Imagens/img2.jpg" alt="slide">
                                </div>
                                <div class="slide">
                                    <img src="Imagens/img3.jpg" alt="slide">
                                </div>
                                <div class="slide">
                                    <img src="Imagens/img4.jpg" alt="slide">
                                </div>
                                <div class="slide">
                                    <img src="Imagens/img5.jpg" alt="slide">
                                </div>
                                <button class="btn" onclick="plusIndex(-1)" id="btn1">&#10094;</button>
                                <button  class="btn" onclick="plusIndex(1)" id="btn2">&#10095;</button>
                            </figure>
                        </div>
					</div>
					<!-- Segundo menu dos itens-->
					<div class="conteudo">
					
					<form action="index.php"  method="POST" name="frmCoisa">
					
						<div class="itens">
						<ul>
							<?php
								require_once('conecta.php');
								$sql = "select * from tbl_categoria";
								
								$select = mysql_query($sql);
								
								while($rs=mysql_fetch_array($select)){
						
							?>
							
								<li><?php echo ($rs['categoria']); ?>
								<ul class="lstsubmenu">
								<?php
								
									
									
									
									$sql1 = "select * from tbl_subcategoria where id_categoria =".$rs['id_categoria'];
									
									$select1 = mysql_query($sql1);
									
									
									
									while ($rs1 = mysql_fetch_array($select1)){
								
								?>
									
										<li><?php echo($rs1['subcategoria']); ?></li>
										
										
										
									
									
									<?php
										
									}
								
									
									?>
								</ul>
								</li>
										<?php
							
								}
	
							?>
							</ul>
							
					
						</div>
						<!-- Area que contem os produtos -->
						<div class="produtos">
							<div class="divisao" >
								<div class="colunasdasdivs">
									<div class="imagem">
										<a href="http://www.corridasbr.com.br/sp/mostracorrida.asp?escolha=5567">
											<div class="imgcarnaval">
											
											</div>
										</a>
									</div>
									<div class="descricao">
										<table>
											<tr >
												<td class="letratitulo">
													Carnaval das Cores
												</td>
											</tr>
											<tr class="descricaoProduto">
												<td>
													As Corridas de Rua surgiram na Inglaterra no século XVIII onde tornaram-se bastante popular, 
													posteriormente, a modalidade expandiu-se para o resto da Europa e Estados Unidos. No final 
													do século XIX as Corridas de Rua ganharam impulso depois do grande sucesso da primeira Maratona 
												</td>
											</tr>
											<tr class="precoProduto">
												<td>
													R$ 90,00
												</td>
											</tr>
											<tr class="detalhesproduto">
												<td>
													<a href="#">
													Detalhes
													</a>
												</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="colunasdasdivs">
									<div class="imagem">
										<a href="http://www.yescom.com.br/fantasy-run/2017/index.asp">
											<div class="imgfantasy">
												
											</div>
										</a>
									</div>
									<div class="descricao">
										<table>
											<tr>
												<td class="letratitulo">
                                                    Fantasy Run
												</td>
											</tr>
											<tr class="descricaoProduto">
												<td>
													As Corridas de Rua surgiram na Inglaterra no século XVIII onde tornaram-se bastante popular, 
													posteriormente, a modalidade expandiu-se para o resto da Europa e Estados Unidos. No final 
													do século XIX as Corridas de Rua ganharam impulso depois do grande sucesso da primeira Maratona 
												</td>
											</tr>
											<tr class="precoProduto">
												<td>
													R$ 90,00
												</td>
											</tr>
											<tr class="detalhesproduto">
												<td>
													<a href="#">
													Detalhes
													</a>
												</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="colunasdasdivs">
									<div class="imagem">
										<a href="http://www.circuitoathenas.com.br/">
											<div class="imgathenas">
											
											</div>
										</a>
									</div>
									<div class="descricao">
										<table>
											<tr>
												<td class="letratitulo">
													Circuito Athenas
												</td>
											</tr>
											<tr class="descricaoProduto">
												<td>
													As Corridas de Rua surgiram na Inglaterra no século XVIII onde tornaram-se bastante popular, 
													posteriormente, a modalidade expandiu-se para o resto da Europa e Estados Unidos. No final 
													do século XIX as Corridas de Rua ganharam impulso depois do grande sucesso da primeira Maratona 
												</td>
											</tr>
											<tr class="precoProduto">
												<td>
													R$ 90,00
												</td>
											</tr>
											<tr class="detalhesproduto">
												<td>
													<a href="#">
													Detalhes
													</a>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="divisao">
								<div class="colunasdasdivs">
									<div class="imagem">
										<a href="http://nightrun.ativo.com/submarine/sao-paulo">
											<div class="imgnight">
											
											</div>
										</a>
									</div>
									<div class="descricao">
										<table>
											<tr>
												<td class="letratitulo">
													Nigth run
												</td>
											</tr>
											<tr class="descricaoProduto">
												<td>
													As Corridas de Rua surgiram na Inglaterra no século XVIII onde tornaram-se bastante popular, 
													posteriormente, a modalidade expandiu-se para o resto da Europa e Estados Unidos. No final 
													do século XIX as Corridas de Rua ganharam impulso depois do grande sucesso da primeira Maratona 
												</td>
											</tr>
											<tr class="precoProduto">
												<td>
													R$ 90,00
												</td>
											</tr>
											<tr class="detalhesproduto">
												<td>
													<a href="#">
													Detalhes
													</a>
												</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="colunasdasdivs">
									<div class="imagem">
										<a href="http://bravusrace.ativo.com/">
											<div class="imgbravus">
									
											</div>
										</a>
									</div>
									<div class="descricao">
										<table>
											<tr>
												<td class="letratitulo">
													Bravus Race
												</td>
											</tr>
											<tr class="descricaoProduto">
												<td>
													As Corridas de Rua surgiram na Inglaterra no século XVIII onde tornaram-se bastante popular, 
													posteriormente, a modalidade expandiu-se para o resto da Europa e Estados Unidos. No final 
													do século XIX as Corridas de Rua ganharam impulso depois do grande sucesso da primeira Maratona 
												</td>
											</tr>
											<tr class="precoProduto">
												<td>
													R$ 90,00
												</td>
											</tr>
											<tr class="detalhesproduto">
												<td>
													<a href="#">
													Detalhes
													</a>
												</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="colunasdasdivs">
									<div class="imagem">
										<a href="http://runcities.com.br/sp/home/">
											<div class="imgmarathon">
											
											</div>
										</a>
									</div>
									<div class="descricao">
										<table>
											<tr>
												<td class="letratitulo">
													City Marathon
												</td>
											</tr>
											<tr class="descricaoProduto">
												<td>
													As Corridas de Rua surgiram na Inglaterra no século XVIII onde tornaram-se bastante popular, 
													posteriormente, a modalidade expandiu-se para o resto da Europa e Estados Unidos. No final 
													do século XIX as Corridas de Rua ganharam impulso depois do grande sucesso da primeira Maratona 
												</td>
											</tr>
											<tr class="precoProduto">
												<td>
													R$ 90,00
												</td>
											</tr>
											<tr class="detalhesproduto">
												<td>
													<a href="#">
													Detalhes
													</a>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</form>
					</div>
				</div>
				<!-- Redes sociais da lateral -->
				<div class="separador">
					<div class="divAuxiliar">
						<div class="caixinhaslaterais">
							<a href="https://pt-br.facebook.com/"><img src="Imagens/facebook.png" alt="facebook"></a>
						</div>
						<div class="caixinhaslaterais">
							<a href="https://twitter.com/login"><img src="Imagens/twitter-big.png" alt="twitter"></a>
						</div>
						<div class="caixinhaslaterais">
							<a href="https://www.instagram.com/?hl=pt-br"><img src="Imagens/instagram.png" alt="instagram"></a>
						</div>
					</div>
				</div>
			</section>
			
		</div>
		<!-- começo do rodape -->
		<footer class="rodape">
			<div class="controladorrodape">
				<div class="fotorodape">
					<div class="conteudorodapeesquerda">
						<!-- Menu do rodape -->
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
						<!-- Area de pesquisar -->
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
	<!-- programação do slide  -->
		<script>
			var index = 1;
			
			function plusIndex(n){
				index = index + n;
				showImage(index);
				
			}
			autoSlide();
			showImage(1);
			
			
			function showImage(n){
				
				var i;
				var x = document.getElementsByClassName("slide");
				if( n > x.length){ index = 1};
				if( n < 1 ){ index = 1};
				
				for(i =0; i<x.length;i++){
					x[i].style.display = "none";
				}
				x[index -1].style.display = "block";
			}
			
			function autoSlide(){
				
				var i;
				
				var x = document.getElementsByClassName("slide");
				
				for(i =0; i<x.length;i++){
					
					x[i].style.display = "none";
					
				}
				if(index > x.length){index = 1}
				x[index -1].style.display = "block";
				index++;
				setTimeout(autoSlide,2000);
			}
		</script>
</html>