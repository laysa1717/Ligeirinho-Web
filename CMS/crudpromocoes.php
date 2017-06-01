<?php

	$titulo = null;	
	$preco  = null;
	$opt = "0";
	$sql = null;
	$flefotos = null;
	$optNome= null;
	$botao="salvar";
	$nomeBotao = "btn_salvar";
	
	session_start();
	$nome = $_SESSION['nomeUsuario'];
		
	require_once('../conecta.php');
	

	/*............................................EDITAR E EXCLUIR..............................................*/
	if(isset($_GET['modo'])){
	$modo = $_GET['modo'];
	if($modo == 'excluir'){
		$codigo = $_GET['codigo'];
		$sql="delete from tbl_promocoes where id_promocoes=".$codigo;
		mysql_query($sql);
		
		//comando para redirecionar para uma pagina
		header('location:crudpromocoes.php');
	}elseif($modo == 'editar'){
		
		$botao = "alterar";
		$nomeBotao = "btn_salvar";
		
		$codigo = $_GET['codigo'];
		$_SESSION['id'] = $codigo;
		/**/
		$sql = "select  p.titulo_promocoes, p.preco, p.id_promocoesEscolha, e.escolha
			from tbl_promocoes as p
			inner join tbl_promocoesescolha as e
			ON p.id_promocoesEscolha = e.id_promocoesEscolha where id_promocoes = ".$codigo;
			
			//echo($sql);
		 $select = mysql_query($sql);
		
		if($rsconsulta=mysql_fetch_array($select)){
			
			$titulo = $rsconsulta['titulo_promocoes'];
			$preco = $rsconsulta['preco'];
			$opt = $rsconsulta['id_promocoesEscolha'];
			$optNome = $rsconsulta['escolha'];
		}
	}elseif($modo == 'ativar'){
		$codigo = $_GET['codigo'];
		$sql="update tbl_promocoes set atde = 1 where id_promocoes = ".$codigo;
		mysql_query($sql);
		
	}elseif($modo == 'desativar'){
		
		$codigo = $_GET['codigo'];
		$sql="update tbl_promocoes set atde = 0 where id_promocoes = ".$codigo;
		mysql_query($sql);
	}
}
	
	/*...........................................SALVANDO / SALVANDO ALTERAÇÕES............................................*/

	if(isset($_POST['btn_salvar'])){
			
			$titulo = $_POST['txttitulo'];
			$preco = $_POST['txtpreco'];
			$opt = $_POST['optgenero'];
			/*Codigo que faz update da foto*/
			$caminho="Imagens/";
			$nome_arquivo=basename($_FILES['flefotos']['name']);
			$uploadfile=$caminho	.$nome_arquivo;
			
			$extensao = strtolower (substr($nome_arquivo, strlen($nome_arquivo) -3,3)); 
			
			if($extensao == 'jpg' || $extensao == 'png'){
				if(move_uploaded_file($_FILES['flefotos']['tmp_name'], $uploadfile)){
					if($_POST['btn_salvar'] == 'salvar'){
						
						echo("aqui");
						/*Inserindo no banco*/
						$sql = "insert into tbl_promocoes(titulo_promocoes, preco, foto, id_promocoesEscolha,atde)";
						$sql =$sql."values('".$titulo."','".$preco."','".$uploadfile."','".$opt."','0')";
						
						//echo($sql);
						
					}else{
						/*Alterando no banco*/
						$sql = "update tbl_promocoes set titulo_promocoes = '".$titulo."',preco='".$preco."',id_promocoesEscolha='".$opt."',foto='".$uploadfile."' where id_promocoes = ".$_SESSION['id'];
					}
					
					
					mysql_query($sql);
					header('location:crudpromocoes.php');
				}
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
			<section id="conteudo1home">
				<div class="titulonovousuario">
					Promoções
				</div>
				<div class="principalHome">
					<div>
						<form name="frmhome" method="POST" action="crudpromocoes.php" enctype="multipart/form-data">
							<table>
								<tr>
									<td class="td">
										Titulo da Corrida:
									</td>
									<td>
										<input class="input" name="txttitulo" value="<?php echo($titulo); ?>" type="text" size="30">
									</td>
								</tr>
								<tr>
									<td class="td">
										Preço:
									</td>
									<td>
										<input class="input" name="txtpreco" value="<?php echo($preco); ?>" type="text" size="30">
									</td>
								</tr>
								<tr>
									<td class="td">
										Escolha o genero da promoção
									</td>
									<td>
										
									<select class="td1" name="optgenero">
										<?php
										if($modo=='editar'){
											?>
											<option value="<?php echo($opt)?>" selected><?php echo ($optNome)?></option>
											<?php
										}else{
										?>
										<option value="<?php ?>" selected>Selecione um Item</option>
										<?php
										
										}
											$sql_funcao = "select * from tbl_promocoesescolha where id_promocoesEscolha<>".$opt;
											$select_funcao = mysql_query($sql_funcao);
											while($rs = mysql_fetch_array($select_funcao)){ ?>
											
											<option value="<?php echo($rs['id_promocoesEscolha']) ?>" ><?php echo($rs['escolha']) ?> </option> <?php

											}
											?>
									</select>
										
									</td>
								</tr>
								<tr>
									<td class="td">
										Foto corrida:
									</td>
									<td>
										<input  name="flefotos" value="<?php echo($foto); ?>" type="file">
									</td>
								</tr>
								<tr>
									<td>
									
									</td>
									<td class="td">
										<input value="<?php echo($botao); ?>" name="<?php echo($nomeBotao); ?>" type="submit">
									</td>
									<td>
										<input name="btnLimpar" type="reset" value="Limpar">
									</td>
								</tr>
							</table>
					</div>
				</div>
				<div class="selectHome">
					<table>
						<tr>
							<td class="td10home">
							
							</td>
							<td class="td10home">
								Titulo
							</td>
							<td class="td10home">
								Preço
							</td>
							<td class="td10home">
								Foto
							</td>
							<td class="td10home">
								
							</td>
							<td class="td10home">
								Ativo/Inativo
							</td>
							<td class="td10home">
								Editar/Excluir
							</td>
						</tr>
						<tr>
							<td class="td10home">
								
							</td>
							<td class="td10home">
								
							</td>
							<td class="td10home">
								
							</td>
							<td class="td10home">
							
							</td>
							<td class="td10home">
								
							</td>
							<td class="td10home">
								
							</td>
						</tr>
						<?php 
						$sql="select * from tbl_promocoes";
						$select = mysql_query($sql);
						
						while($rs=mysql_fetch_array($select)){
						?> 
						<tr>
							<td class="td10homeAux">
								<?php if($rs['id_promocoesEscolha'] == 1){
									echo("Feminino");
								}else{
									echo("Masculino");
								}
									
								
								?>
							</td>
							<td class="td10home">
								<?php echo ($rs['titulo_promocoes']);?>
							</td>
							<td class="td10home">
								<?php echo ($rs['preco']);?>
							</td>
							<td class="td10home">
								<img class="imgselect"<?php echo  ("src='".$rs['foto']."'");?>>
							</td>
							
							<td class="td10homeAux">
								<?php if($rs['atde'] == 1){
									echo("Ativado");
								}else{
									echo("Desativado");
								}
									
								
								?>
							</td>
							<td class="td10home">
								<a href="crudpromocoes.php?modo=ativar&codigo=<?php echo($rs['id_promocoes']);?>">
								<img src="Imagens/ativo.jpg">
								</a>
								<a href="crudpromocoes.php?modo=desativar&codigo=<?php echo($rs['id_promocoes']);?>">	
								<img src="Imagens/inativo.jpg">
								</a>
							</td>
							<td class="td10home">
								<a href="crudpromocoes.php?modo=excluir&codigo=<?php echo($rs['id_promocoes']);?>">
								<img src="Imagens/excluir.png">
								</a>
								<a href="crudpromocoes.php?modo=editar&codigo=<?php echo($rs['id_promocoes']);?>">
								<img src="Imagens/editar.png">
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
			<footer id="rodape">
				
			</footer>
		</div>
	</body>
</html>