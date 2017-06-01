<?php
	
	$nomeZ=null;
	$telefone = null;
	$sexo = null;
	$email = null;
	$profissao = null;
	$sugestao = null;
	
	
	session_start();
	$nome = $_SESSION['nomeUsuario'];
		
	
	
	require_once('../conecta.php');
	
	
	/*Mostrar Detalhes*/
	
	if(isset($_GET['modo'])){
		$modo = $_GET['modo'];
		$codigo = $_GET['codigo'];
		$_SESSION['id'] = $codigo;
		$sql = "select * from tblformulario where idformulario=".$codigo;
		$select = mysql_query($sql);
		
		if($rsconsulta=mysql_fetch_array($select)){
			
			/*Variaveis de Sessão que aparece na pagina principal do CMS*/
			$nomeZ = $rsconsulta['nome'];
			$telefone = $rsconsulta['telefone'];
			$sexo = $rsconsulta['sexo'];
			$email = $rsconsulta['email'];			
			$profissao = $rsconsulta['profissao'];
			$sugestao = $rsconsulta['sugestao'];
		}
	}
	
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
			<section id="conteudo10">
				<div class="contFaleConosco">
					<form name="frmFaleConosco" method="GET" action="admfale.php">
						<table>
							<tr>
								<td class="td21">Nome</td>
								<td class="td21">Email</td>
								<td class="td21">Profissão</td>
							</tr>
							<tr>
								<td class="td21"></td>
								<td class="td21"></td>
								<td class="td21"></td>
							</tr>
							<?php
								$sql = "select * from tblformulario";
								
								$select = mysql_query($sql);
							
								while($rs=mysql_fetch_array($select)){
							?>
							<tr>
								<td class="td21"><?php echo ($rs['nome']); ?></td>
								<td class="td21"><?php echo ($rs['email']); ?></td>
								<td class="td21"><?php echo ($rs['profissao']); ?></td>
								
								<td class="td201">
									<a href="admfale.php?modo=info&codigo=<?php echo($rs['idformulario']);?>">
									<img src="Imagens/info1.png">
									</a>
								</td>
							</tr>
							<?php
								}
							?>
						</table>
					</form>
				</div>
			</section>
			<div class="mostrarCadastros">
				<div class="aaa">
					
				</div>
				<div class="controladorFale">
					<div class="tituloFaleConosco">
						<div class="tituloFale">
							Nome:
						</div>
						<div class="tituloFale">
							Telefone:
						</div>
						<div class="tituloFale">
							Sexo:
						</div>
						<div class="tituloFale">
							Email:
						</div>
						<div class="tituloFale">
							Profissão:
						</div>
						<div class="tituloFale">
							Sugestão:
						</div>
					</div>
					<div class="selectInformações">
						<div class="contFale">
							 <?php echo($nomeZ); ?>
						</div>
						<div class="contFale">
							<?php echo($telefone); ?>
						</div>
						<div class="contFale">
							<?php echo($sexo); ?>
						</div>
						<div class="contFale">
							<?php echo($email); ?>
						</div>
						<div class="contFale">
							<?php echo($profissao); ?>
						</div>
						<div class="contSugestao">
							<?php echo($sugestao); ?>
						</div>
					
					</div>
					
				</div>
			</div>
			<footer id="rodape">
			
			</footer>
		</div>
	</body>
</html>