<?php

	$nomeZ = null;
	$telefone = null;
	$celular = null;
	$email = null;
	$login = null;
	$funcao = null;
	$senha = null;
	$profissao = null;
	
	session_start();
	$nome = $_SESSION['nomeUsuario'];
	
	require_once('../conecta.php');
	
	
	
/* EXCLUIR e EDITAR*/
if(isset($_GET['modo'])){
	$modo = $_GET['modo'];
	if($modo == 'excluir'){
		$codigo = $_GET['codigo'];
		$sql="delete from tbl_usuario where id_novoUsuario=".$codigo;
		mysql_query($sql);
		
		//comando para redirecionar para uma pagina
		header('location:usuarioscadastrados.php');
	}elseif($modo == 'editar'){
		$codigo = $_GET['codigo'];
		$_SESSION['id'] = $codigo;
		$sql = "select * from tbl_usuario where id_novoUsuario=".$codigo;
		$select = mysql_query($sql);
		
		if($rsconsulta=mysql_fetch_array($select)){
			
			$nomeZ = $rsconsulta['nome'];
			$login = $rsconsulta['login'];
			$email = $rsconsulta['email'];
			$senha = $rsconsulta['senha'];
			$telefone = $rsconsulta['telefone'];
			$profissao = $rsconsulta['profissao'];
			$funcao = $rsconsulta['id_funcao'];
		}
	}
}

/*Salvando Alterações*/
if(isset($_GET['salvar'])){
	
	
	$nome=$_GET['txtNome'];
	$telefone=$_GET['txttelefone'];
	$email=$_GET['txtemail'];
	$login = $_GET['txtlogin'];
	$senha = $_GET['txtsenha'];
	$profissao = $_GET['txtprofissao'];
	$funcao = $_GET['txtfuncao'];
			
	
	$sql = "update tbl_usuario set nome='".$nome."',telefone='".$telefone."',email='".$email."', login='".$login."', senha= '".$senha."', profissao='".$profissao."', id_funcao='".$funcao."' where id_novoUsuario = ".$_SESSION['id'];
	//echo($sql);
	mysql_query($sql);
	header('location:usuarioscadastrados.php');
}else{
	
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
				<div class="controlador">
					<div class="tituloUsuariosCadastrados">
						Cadastros
					</div>
					<table >
						<tr  >
							<td class="td3">
								Nome:
							</td>
							<td class="td3">
								Telefone:
							</td>
							<td class="td3">
								Email:
							</td>
							<td class="td3">
								função:
							</td>
							<td class="td3">
								
							</td>
						</tr>
						<tr>
							<td class="td3">
								
							</td>
							<td class="td3">
								
							</td>
							<td class="td3">
								
							</td>
							<td class="td3">
								
							</td>
							<td class="td3">
								
							</td>
						</tr>
						<?php 
						$sql="select * from tbl_usuario";
						$select = mysql_query($sql);
						
						while($rs=mysql_fetch_array($select)){
						?> 
						<tr>
							<td class="td3">
								<?php echo ($rs['nome']);?>
							</td>
							<td class="td3">
								<?php echo ($rs['telefone']);?>
							</td>
							<td class="td3">
								<?php echo ($rs['email']);?>
							</td>
							<td class="td3">
								<?php 
											
										if ($rs['id_funcao'] == 1){
											echo ("Administrador");
										}else{
											echo("Funcionário");
											
										}
									?>
							</td>
							<td class="td3">
								<a href="usuarioscadastrados.php?modo=excluir&codigo=<?php echo($rs['id_novoUsuario']);?>">
								<img src="Imagens/excluir.png">
								</a>
								<a href="usuarioscadastrados.php?modo=editar&codigo=<?php echo($rs['id_novoUsuario']);?>">
								<img src="Imagens/editar.png">
								</a>
							</td>
							
						</tr>
						<?php
						}
						?>
					</table>
				</div>
			</section>
			<div class="mostrarCadastros">
				<div class="aaa">
					
				</div>
				<div class="controlador">
					<div class="ladoA">
					<form name="haha" method="GET" action="usuarioscadastrados.php">
					<table>
						<tr>
							<td class="td10">
								Nome:
							</td>
							<td>
								<input value="<?php echo($nomeZ); ?>" name="txtNome" class="input" type="text" size="30">
							</td>
						</tr>
						<tr>
							<td class="td10">
								Login:
							</td>
							<td>
								<input value="<?php echo($login); ?>" name="txtlogin" class="input" type="text" size="30">
							</td>
						</tr>
						<tr>
							<td class="td10">
								Telefone:
							</td>
							<td>
								<input value="<?php echo($telefone); ?>" name="txttelefone" class="input" type="text" size="30">
							</td>
						</tr>
						<tr>
							<td class="td10">
								Função:
							</td>
							<td>
								<input  value="<?php echo($funcao); ?>" name="txtfuncao" class="input" type="text" size="30">
							</td>
						</tr>
					</table>
					</div>
					<div class="ladoB">
						
							<table>
								<tr>
									<td class="td10">
										Email:
									</td>
									<td>
										<input value="<?php echo($email); ?>" name="txtemail" class="input" type="text" size="30">
									</td>
								</tr>
								<tr>
									<td class="td10">
										Senha:
									</td>
									<td>
										<input value="<?php echo($senha); ?>" name="txtsenha" class="input" type="text" size="30">
									</td>
								</tr>
								<tr>
									<td class="td10">
										Profissão:
									</td>
									<td>
										<input value="<?php echo($profissao); ?>" name="txtprofissao" class="input" type="text" size="30">
									</td>
								</tr>
								<tr>
									<td>
										<input type="submit" size="20" name="salvar" value="Alterar">
									</td>
									<td>
										<input type="submit" size="20" name="Limpar" value="Limpar">
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
			<footer id="rodape">
				
			</footer>
		</div>
	</body>
</html>