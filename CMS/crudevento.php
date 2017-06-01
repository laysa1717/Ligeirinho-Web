<?php

	session_start();
	$nome = $_SESSION['nomeUsuario'];
	
	
	$titulo= null;
	$descricao = null;
	$horario = null;
	$local = null;
	$flefotos = null;
	$botao = "Salvar";
	

	require_once('../conecta.php');
	
	/*Editando e Excluindo*/
	
	if(isset($_GET['modo'])){
		
		$modo = $_GET['modo'];
		
		/*Excluindo*/
		if($modo == 'excluir'){
			
			$codigo = $_GET['codigo'];
			$sql = "delete from tbl_evento where id_evento=".$codigo;
			mysql_query($sql);
			header('location:crudevento.php');
			
		/*Editando*/
		}elseif($modo == 'editar'){
			
			$botao = "alterar";
			

			
			$codigo = $_GET['codigo'];
			$_SESSION['id'] = $codigo;
			$sql = "select * from tbl_evento where id_evento = ".$codigo;
			$select = mysql_query($sql);
			
			if($rsconsulta = mysql_fetch_array($select)){
				
				$titulo = $rsconsulta['titulo'];
				$horario = $rsconsulta['horario'];
				$descricao = $rsconsulta['texto'];
				$local = $rsconsulta['local'];
			}
				
		}
		elseif($modo == 'ativar'){
		$codigo = $_GET['codigo'];
		$sql="update tbl_evento set atde = 1 where id_evento = ".$codigo;
		mysql_query($sql);
		
	}elseif($modo == 'desativar'){
		
		$codigo = $_GET['codigo'];
		$sql="update tbl_evento set atde = 0 where id_evento = ".$codigo;
		mysql_query($sql);
	}
}
	
	
	
	/*SALVANDO ALTERAÇÕES / SALVANDO */
	if(isset($_POST['btn_salvar'])){
		
		
		$titulo = $_POST['txttitulo'];
		$descricao = $_POST['txtdescricao'];
		$horario = $_POST['txthorario'];
		$local = $_POST['txtlocal'];
		/*Codigo que faz update da foto*/
		$caminho="Imagens/";
		$nome_arquivo=basename($_FILES['flefotos']['name']);
		$uploadfile=$caminho.$nome_arquivo;
		
		$extensao = strtolower (substr($nome_arquivo, strlen($nome_arquivo) -3,3)); 
		
		if($extensao == 'jpg' || $extensao == 'png'){
			if(move_uploaded_file($_FILES['flefotos']['tmp_name'], $uploadfile)){
				if($_POST['btn_salvar'] == 'Salvar'){
					
					
					/*Inserindo no banco*/
					$sql = "insert into tbl_evento(titulo, local,horario, foto, texto, atde)";
					$sql =$sql."values('".$titulo."','".$local."','".$horario."','".$uploadfile."','".$descricao."','0')";
					
					//echo($sql);
				
					
				}elseif($_POST['btn_salvar'] == 'alterar'){
					/*Alterando no banco*/
					$sql = "update tbl_evento set titulo = '".$titulo."',local='".$local."',horario='".$horario."',texto='".$descricao."',foto='".$uploadfile."' where id_kits = ".$_SESSION['id'];
					echo("aqui1");
				}
				
				//echo("aqui23");
				mysql_query($sql);
				header('location:crudevento.php');
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
					Evento do Mês
				</div>
				<div class="principalHome">
					<div>
						<form name="frmhome" method="POST" action="crudevento.php" enctype="multipart/form-data">
							<table>
								<tr>
									<td class="td">
										Titulo:
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
										horario:
									</td>
									<td>
										<input class="input" name="txthorario" value="<?php echo($horario); ?>" type="text" size="30">
									</td>
								</tr>
								<tr>
									<td class="td">
										local:
									</td>
									<td>
										<input class="input" name="txtlocal" value="<?php echo($local); ?>" type="text" size="30">
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
								Preço
							</td>
							<td class="td10home">
								Local
							</td>
							<td class="td10home">
								Foto
							</td>
							<td class="td10home">
								
							</td>
							<td class="td10home">
								Ativo/Inativo
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
						$sql="select * from tbl_evento";
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
								<?php echo ($rs['horario']);?>
							</td>
							<td class="td10home">
								<?php echo ($rs['local']);?>
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
								<a href="crudevento.php?modo=ativar&codigo=<?php echo($rs['id_evento']);?>">
								<img src="Imagens/ativo.jpg">
								</a>
								<a href="crudevento.php?modo=desativar&codigo=<?php echo($rs['id_evento']);?>">	
								<img src="Imagens/inativo.jpg">
								</a>
							</td>
							<td class="td10home">
								<a href="crudevento.php?modo=excluir&codigo=<?php echo($rs['id_evento']);?>">
								<img src="Imagens/excluir.png">
								</a>
								<a href="crudevento.php?modo=editar&codigo=<?php echo($rs['id_evento']);?>">
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