<?php
	$nome = null;
	$telefone = null;
	$dtNasc = null;
	$sexo = null;
	$email = null;
	$profissao = null;
	$sugestao = null;
	$optsexo = null;
	$optsexo = null;

	/*Conexao com o banco de dados mysql*/
	
	$conexao = mysql_connect('localhost', 'root', 'bcd127');
	
	mysql_select_db('dbfaleconosco');
	
	//Enviar no banco
	if(isset($_GET['btnSalvar'])){
		$nome = $_GET['txtnome'];
		$telefone = $_GET['txttelefone'];
		$dtNasc = $_GET['datedtnasc'];
			$dtNasc = explode("/",$dtNasc);
		//separamos o vetor em 3 variaveis: dia, mes e ano
			$dia=$dtNasc[0];
			$mes=$dtNasc[1];
			$ano=$dtNasc[2];
		//Criamos uma variavel para receber a data em um novo padrão
		$dt_banco = $ano."-".$mes."-".$dia;
		$sexo = $_GET['optsexo'];
		$email = $_GET['txtemail'];
		$profissao = $_GET['txtprofissao'];
		$sugestao = $_GET['txtsugestao'];
		
		if($_GET['btnSalvar']){
			$sql="insert into tblformulario (nome, telefone, dtNasc, sexo, email, profissao, sugestao)";
			$sql = $sql."values ('".$nome."','".$telefone."','".$dt_banco."','".$sexo."','".$email."','".$profissao."','".$sugestao."')";
		}
		
		mysql_query($sql);
		
	}
?>
<html>
	<head>
		<title>Fale conosco</title>
		<link rel="stylesheet" type="text/css" href="css/stylefaleconosco.css">
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
								<td class="formatacaofonte">
									Usuario:
								</td>
								<td class="formatacaofonte">
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
									<input value="OK" name="btn_ok" type="submit"  >
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			
		</header>
		<section class="principal">
				<!-- Conteudo -->
				
				<div class="frmfaleconosco">
				
				
					<form name="cadastro" method="get" action="">
						
							<div class="titulo">
								Cadastro
							</div>
							<table>
								<tr>
									<td class="formatacaofont">
										Nome:
									</td>
									<td>
										<input value="" name="txtnome" type="text" size="30" >
									</td>
								</tr>
								<tr>
									<td class="formatacaofont">
										Telefone:
									</td>
									<td>
										<input  pattern="[0-9]{3} [0-9]{4}-[0-9]{4}" placeholder="011 9999-9999"  name="txttelefone" type="" size="30" >
									</td>
								</tr>
								<tr>
									<td class="formatacaofont">
										Data de nascimento:
									</td>
									<td>
										<input required  pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" placeholder="dd/mm/AAAA" value="" name="datedtnasc" type="text" size="30" >
									</td>
								</tr>
								<tr>
									<td class="formatacaofont">
										Sexo:
									</td>
									<td class="formatacaofont">
										<input value="Feminino" name="optsexo" type="radio" size="30" >Feminino
										<input value="Masculino" name="optsexo" type="radio" size="30" >Masculino
									</td>
								</tr>
								<tr>
									<td class="formatacaofont">
										E-mail:
									</td>
									<td>
										<input value="" name="txtemail" type="text" size="30" >
									</td>
								</tr>
								<tr>
									<td class="formatacaofont">
										Profissão
									</td>
									<td>
										<input value="" name="txtprofissao" type="text" size="30" >
									</td>
								</tr>
								<tr>
									<td class="formatacaofont">
										Sugestao
									</td>
									<td>
										<textarea value="" name="txtsugestao" type="text" size="30" cols="32" rows="10" > </textarea>
									</td>
								</tr>
								<tr>
									<td class="formatacaofont">
										
									</td>
									<td>
										<input value="Enviar" name="btnSalvar" type="submit"  >
										<input value="Limpar" name="btnlimpar" type="submit"  >
									</td>
									
								</tr>
							</table>
						
					</form>
					

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
	</body>
</html>