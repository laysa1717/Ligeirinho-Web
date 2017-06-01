<?php

	session_start();
	$nome = $_SESSION['nomeUsuario'];
	
	
	$titulo= null;
	$descricao = null;
	$flefotos1 = null;
	$flefotos2 = null;
	$flefotos3 = null;
	$flefotos4 = null;
	$flefotos5 = null;
	$botao = "Salvar";
	

	require_once('../conecta.php');
	
	/*Editando e Excluindo*/
	
	if(isset($_GET['modo'])){
		
		$modo = $_GET['modo'];
		
		/*Excluindo*/
		if($modo == 'excluir'){
			
			$codigo = $_GET['codigo'];
			$sql = "delete from tbl_noticia where id_corrida=".$codigo;
			mysql_query($sql);
			header('location:crudkits.php');
		
		/*Editando*/
		}elseif($modo == 'editar'){
			
			$botao = "alterar";
			

			
			$codigo = $_GET['codigo'];
			$_SESSION['id'] = $codigo;
			$sql = "select * from tbl_noticia where id_corrida = ".$codigo;
			$select = mysql_query($sql);
			
			if($rsconsulta = mysql_fetch_array($select)){
				
				$titulo = $rsconsulta['titulo'];
				
				$descricao = $rsconsulta['descricao'];
				
			}
				
		}
		elseif($modo == 'ativar'){
		$codigo = $_GET['codigo'];
		$sql="update tbl_noticia set atde = 1 where id_corrida = ".$codigo;
		mysql_query($sql);
		
	}elseif($modo == 'desativar'){
		
		$codigo = $_GET['codigo'];
		$sql="update tbl_noticia set atde = 0 where id_corrida = ".$codigo;
		mysql_query($sql);
	}
}
	
	
	
	/*SALVANDO ALTERAÇÕES / SALVANDO */
	if(isset($_POST['btn_salvar'])){
		
		
		$titulo = $_POST['txttitulo'];
		$descricao = $_POST['txtdescricao'];
		
		
		require_once('upload.php');
		
			/*Codigo que faz update da foto, chamando a função criada*/
			$upload1 = uploadFotos($_FILES['flefotos1']);
			$upload2 = uploadFotos($_FILES['flefotos2']);
			$upload3 = uploadFotos($_FILES['flefotos3']);
			$upload4 = uploadFotos($_FILES['flefotos4']);
			$upload5 = uploadFotos($_FILES['flefotos5']);
			
			if($upload1!="" && $upload2!="" && $upload3!="" && $upload4!="" && $upload5!=""){
				if($_POST['btn_salvar'] == 'Salvar'){
					
					/*Inserindo no banco*/
					$sql = "insert into tbl_noticia(titulo, foto1, foto2,foto3,foto4,foto5, texto ,atde)";
					$sql =$sql."values('".$titulo."','".$upload1."','".$upload2."','".$upload3."','".$upload4."','".$upload5."','".$descricao."','0')";
					
				
					//echo($sql);
					
					
				}elseif($_POST['btn_salvar'] == 'alterar'){
					/*Alterando no banco*/
					$sql = "update tbl_noticia set titulo = '".$titulo."',texto='".$descricao."',foto='".$uploadfile."' where id_kits = ".$_SESSION['id'];
				}
				
				
				mysql_query($sql);
				header('location:crudnoticias.php');
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
					Noticias
				</div>
				<div class="principalHome">
					<div>
						<form name="frmhome" method="POST" action="crudnoticias.php" enctype="multipart/form-data">
							<table>
								<tr>
									<td class="td">
										Titulo do Kit:
									</td>
									<td>
										<input class="input" name="txttitulo" value="<?php echo($titulo); ?>" type="text" size="30">
									</td>
								</tr>
								<tr>
									<td class="td">
										Descrição:
									</td>
									<td>
										<input class="input" name="txtdescricao" value="<?php echo($descricao); ?>" type="text" size="30">
									</td>
								</tr>
								
								
								<tr>
									<td class="td">
										Foto da Esquerda:
									</td>
									<td>
										<input  name="flefotos1" value="<?php echo($foto); ?>" type="file">
									</td>
								</tr>
								<tr>
									<td class="td">
										Foto1: 
									</td>
									<td>
										<input  name="flefotos2" value="<?php echo($foto); ?>" type="file">
									</td>
								</tr>
								<tr>
									<td class="td">
										Foto2: 
									</td>
									<td>
										<input  name="flefotos3" value="<?php echo($foto); ?>" type="file">
									</td>
								</tr>
								<tr>
									<td class="td">
										Foto3: 
									</td>
									<td>
										<input  name="flefotos4" value="<?php echo($foto); ?>" type="file">
									</td>
								</tr>
								<tr>
									<td class="td">
										Foto4: 
									</td>
									<td>
										<input  name="flefotos5" value="<?php echo($foto); ?>" type="file">
									</td>
								</tr>
								<tr>
									<td>
									
									</td>
									<td class="td">
										<input value="<?php echo($botao); ?>" name="btn_salvar" type="submit">
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
								Titulo
							</td>
							<td class="td10home">
								Descrição
							</td>
							
							<td class="td10home">
								Foto1
							</td>
							<td class="td10home">
								Foto2
							</td>
							<td class="td10home">
								Foto3
							</td>
							<td class="td10home">
								Foto4
							</td>
							<td class="td10home">
								Foto5
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
						$sql="select * from tbl_noticia";
						$select = mysql_query($sql);
						
						while($rs=mysql_fetch_array($select)){
						?> 
						<tr>
							<td class="td10home">
								<?php echo ($rs['titulo']);?>
							</td>
							<td class="td10home">
								<?php echo ($rs['texto']);?>
							</td>
							
							<td class="td10home">
								<img class="imgselect"<?php echo  ("src='".$rs['foto1']."'");?>>
							</td>
							<td class="td10home">
								<img class="imgselect"<?php echo  ("src='".$rs['foto2']."'");?>>
							</td>
							<td class="td10home">
								<img class="imgselect"<?php echo  ("src='".$rs['foto3']."'");?>>
							</td>
							<td class="td10home">
								<img class="imgselect"<?php echo  ("src='".$rs['foto4']."'");?>>
							</td>
							<td class="td10home">
								<img class="imgselect"<?php echo  ("src='".$rs['foto5']."'");?>>
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
								<a href="crudnoticias.php?modo=ativar&codigo=<?php echo($rs['id_corrida']);?>">
								<img src="Imagens/ativo.jpg">
								</a>
								<a href="crudnoticias.php?modo=desativar&codigo=<?php echo($rs['id_corrida']);?>">	
								<img src="Imagens/inativo.jpg">
								</a>
							</td>
							
							<td class="td10home">
								<a href="crudnoticias.php?modo=excluir&codigo=<?php echo($rs['id_corrida']);?>">
								<img src="Imagens/excluir.png">
								</a>
								<a href="crudnoticias.php?modo=editar&codigo=<?php echo($rs['id_corrida']);?>">
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