<?php
	
	session_start();
	$nome = $_SESSION['nomeUsuario'];
	
	$nomeUser = null;
	$login = null;
	$senha = null;
	$telefone = null;
	$celular = null;
	$email = null;
	$dtNasc = null;
	$sexo = null;
	$funcao = null;
	$profissao = null;
	//$btn_cadastrar = null;
	$sql = null;
	
		require_once('../conecta.php');

	
	if(isset($_POST['btn_cadastrar'])){
		
		$nomeUser = $_POST['txtNome'];
		$login = $_POST['txtLogin'];
		$senha = $_POST['txtSenha'];
		$telefone = $_POST['txtTelefone'];
		$celular = $_POST['txtCelular'];
		$email = $_POST['txtEmail'];
		$dtNasc = $_POST['datedtnasc'];
			$dtNasc = explode("/",$dtNasc);
			$dia=$dtNasc[0];
			$mes=$dtNasc[1];
			$ano=$dtNasc[2];
		$dt_banco = $ano."-".$mes."-".$dia;
		$sexo = $_POST['optsexo'];
		$funcao = $_POST['optfuncao'];
		$profissao = $_POST['txtProfissão'];
	}
	
	if(isset($_POST['btn_cadastrar'])){
		
		$sql = "insert into tbl_usuario(nome, login, senha, telefone, celular, email, dtNasc, sexo, id_funcao, profissao )";
		$sql = $sql."values('".$nomeUser."','".$login."','".$senha."','".$telefone."','".$celular."','".$email."','".$dt_banco."','".$sexo."','".$funcao."','".$profissao."')";
	
	}
	//echo($sql);
	mysql_query($sql);
	
	
	
	
	
	
	
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
					<div class="esquerda1" >
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
								Bem-vindo <?php echo($nome); ?>
							</div>
							<div class="sair">
								<a href="../index.php"> SAIR </a>
							</div>
						</a>
					</div>
				</nav>
			</div>
			<section id="conteudo1">
				<div class="titulonovousuario">
					Novo usuário
				</div>
				<div class="formadd">
					<form  name="login" method="Post" action="addnovousuario.php">
						<table>
							<tr>
								<td class="td">
									Nome: 
								</td>
								<td>
									<input class="input" value="" name="txtNome" type="text" size="15" >
								</td>
							</tr>
							<tr>
								<td class="td">
									Login: 
								</td>
								<td>
									<input class="input2" value="" name="txtLogin" type="text" size="15" >
								</td>
								
							</tr>
							<tr>
								<td class="td">
									Senha: 
								</td>
								<td>
									<input class="input2" value="" name="txtSenha" type="text" size="15" >
								</td>
							</tr>
							<tr>
								<td class="td">
									Telefone: 
								</td>
								<td>
									<input class="input" value="" name="txtTelefone" type="text" size="15" >
								</td>
							</tr>
							<tr>
								<td class="td">
									Celular:
								</td>
								<td>
									<input class="input" value="" name="txtCelular" type="text" size="15" >
								</td>
							</tr>
							<tr>
								<td class="td">
									Email:
								</td>
								<td>
									<input class="input" value="" name="txtEmail" type="text" size="15" >
								</td>
							</tr>
							<tr>
								<td class="td">
									Data de Nascimento:
								</td>
								<td>
									<input class="input" value="" name="datedtnasc" type="text" size="15" >
								</td>
							</tr>
							<tr>
								<td class="td">
									Sexo:
								</td>
								<td>
									<input value="Feminino" name="optsexo" type="radio" size="30" >Feminino
									<input value="Masculino" name="optsexo" type="radio" size="30" >Masculino
								</td>
							</tr>
							<tr>
								<td class="td">
									Função:
								</td>
								<td>
								
									
									<select class="td1" name="optfuncao">
										<option value="" selected>Selecione um Item</option>
										<?php
		
											$sql_funcao = "select * from tbl_funcao";
											$select_funcao = mysql_query($sql_funcao);
											while($rs = mysql_fetch_array($select_funcao)){ ?>
											
											<option value="<?php echo($rs['id_funcao']) ?>" ><?php echo($rs['nomeFuncao']) ?> </option> <?php

											}
											?>
									</select>
								</td>
							</tr>
							<tr>
								<td class="td">
									Profissão:
								</td>
								<td>
									<input class="input" value="" name="txtProfissão" type="text" size="15" >
								</td>
							</tr>
							<tr>
								<td >
									
								</td>
								<td>
									<input class="botao" value="Salvar" name="btn_cadastrar" type="submit" size="15" >
									
								</td>
							</tr>
						</table>
					</form>
				</div>
			</section>
			<footer id="rodape">
				
			</footer>
		</div>
	</body>
</html>