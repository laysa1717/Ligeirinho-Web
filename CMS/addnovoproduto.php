
	
<?php	session_start();
	$nome = $_SESSION['nomeUsuario'];
	
	require_once('../conecta.php'); 
	
	$nomeTitulo = null;
	$descricao = null;
	$preco = null;
	$flefotos = null;
	$sql = null;
	$subcategoria = null;
	$botao = "Salvar";
	
	

	/* INSERÇÃO NO BANCO */
	
	if(isset($_POST['btn_salvar'])){
		
		$nomeTitulo = $_POST['txttitulo'];
		$descricao = $_POST['txtdescricao'];
		$preco = $_POST['txtpreco'];
		$subcategoria = $_POST['optfuncao'];
		
		$caminho="Imagens/";
			$nome_arquivo=basename($_FILES['filefotos']['name']);
			$uploadfile=$caminho.$nome_arquivo;
			
			$extensao = strtolower(substr($nome_arquivo, strlen($nome_arquivo) -3,3)); 
			
			if($extensao == 'jpg' || $extensao == 'png'){
				if(move_uploaded_file($_FILES['filefotos']['tmp_name'], $uploadfile)){
					
					if($_POST['btn_salvar'] == 'Salvar'){
						
					$sql = "insert into tbl_produto(tituloCorrida, preco, descricao, id_subcategoria, fotoCorrida, atde)";
					$sql = $sql."values('".$nomeTitulo."','".$preco."','".$descricao."','".$subcategoria."','".$uploadfile."','0')";
				}else{
					
					
				}
			}
			}
			
			//echo($sql);
			mysql_query($sql);
			header('location:addnovoproduto.php');
	}
	
?>




<html>
	<head>
		<title>Administração</title>
		<link rel="stylesheet" type="text/css" href="css/styleadm.css">
		
		<script type="text/javascript">
			<!--
			function MM_jumpMenu(targ,selObj,restore){ //v3.0
			eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
			if (restore) selObj.selectedIndex=0;
			}
			//-->
		</script>
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
            
            <?php
                
                $categoria = null;
            
                
            if(isset($_POST['btn_inserir'])){
                
                
                $categoria = $_POST['txtcategoria'];
                
              
                
                $sql = "insert into tbl_categoria(categoria)";
                $sql = $sql."values('".$categoria."')";
                //echo($sql);
                mysql_query($sql); 
                header('location:addnovoproduto.php');
                
            }
            
            
           
            ?>
            <div class="controladorsection">
                <div class="contProdutos">
                    <div class="titulosss">
                        Categorias
                    </div>
                    <div class="novacategoria">
                        <div class="divquedeixanomeio">
                            <div class="deixandonomeio">
                                <form method="POST" name="frminserir" action="addnovoproduto.php">
                                    <table>
                                        <tr>
                                            <td class="tdzinha">
                                                Categoria:
                                            </td>
                                            <td>
                                                <input class="input" size="30" name="txtcategoria">
                                            </td>
											
                                        </tr>
                                        <tr>
                                            <td >

                                            </td>
                                            <td>
                                                <input class="botao1" size="30" type="submit" value="Inserir" name="btn_inserir">
                                            </td>
                                        </tr>
                                    </table>
                            </div>
                            
                            
                            <div class="deixandonomeio1">
                                <?php
                                
                                    $sql = "select * from tbl_categoria";
                                    $select = mysql_query($sql);

                                    while($rs=mysql_fetch_array($select)){
                                ?>
								<table>
									<tr>
										<td class="linhaselect">
											<?php echo($rs['categoria']); ?>
										</td>
										<td class="linhaselect">
											Editar/Excluir
										</td>
									<tr>
								</table>
                                <?php
                                    }
                                ?>
                            </div>
							<div class="titulosss">
								Sub Categoria
							</div>
							
							<?php
								
								$subcategoria = null;
								
								
								
								
								
								
								
								
								if(isset($_POST['btn_cadastrar'])){
									$subcategoria = $_POST['txtsubcategoria'];
									
									$id_categoria = $_POST['optfuncao'];
									
									$sql = "insert into tbl_subcategoria(subcategoria, id_categoria)";
									$sql = $sql."values('".$subcategoria."','".$id_categoria."')";
									//echo($sql);
									mysql_query($sql);
								}
								
							
							?>
							<div class="subcategorias0">
								<div class="deixandonomeio">
                                    <table>
                                        <tr>
                                            <td class="tdzona">
                                               Sub Categoria
                                            </td>
                                            <td >
                                                <input class="input" size="30" name="txtsubcategoria">
                                            </td>
                                        </tr>
										<tr>
                                            <td class="tdzona">
                                                Estará vinculada com:
                                            </td>
                                            <td >
                                                <select class="td1" name="optfuncao">
													<option value="" selected>Selecione um Item</option>
													<?php
					
														$sql_funcao = "select * from tbl_categoria";
														$select_funcao = mysql_query($sql_funcao);
														while($rs = mysql_fetch_array($select_funcao)){ ?>
														
														<option value="<?php echo($rs['id_categoria']) ?>" ><?php echo($rs['categoria']) ?> </option> <?php

														}
														?>
												</select>
                                            </td>
                                        </tr>
                                        <tr>
                                           
                                            <td>
                                                <input class="botao1" size="30" type="submit" value="Inserir" name="btn_cadastrar">
                                            </td>
                                        </tr>
                                    </table>
									</form>
								</div>
							</div>
							<div class="subcategorias0">
								<table>
									<tr>
										<td class="tdzinha">
											Produto
										</td>
										<td class="tdzinha">
											Categoria
										</td>
										<td class="tdzinha">
											Sub Categoria
										</td>
									</tr>
									<tr>
										<td class="tdzinha">
											
										</td>
										<td class="tdzinha">
											
										</td>
										<td class="tdzinha">
											
										</td>
									</tr>
									
									<?php
										
										$sql = "select  c.categoria , s.subcategoria
												from tbl_categoria as c
												inner join tbl_subcategoria as s
												on c.id_categoria = s.id_categoria";
												
										$select = mysql_query($sql);
										
										while ($rs = mysql_fetch_array($select)){
										
									?>
									<tr>
										<td class="tdzinhaaaaa">
											Produto
										</td>
										<td class="tdzinhaaaaa">
											<?php echo($rs['categoria'])?>
										</td>
										<td class="tdzinhaaaaa">
											<?php echo($rs['subcategoria'])?>
										</td>
										<td class="tdzinhaaaaa">
											Editar / Excluir
										</td>
									</tr>
									<?php
										}
									?>
								</table>
							</div>
                        </div>
                    </div>
                </div>
                <div class="contProdutos">
                    <div class="produto">
                        <div class="titulosss">
                           Novo Produto 
                        </div>
						<div>
						<form name="frmhome" method="post" action="addnovoproduto.php" enctype="multipart/form-data">
							<table>
								<tr>
										<td class="tdzona">
											Categoria
										</td>
										<td >
											<select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="td1" >
												
												<?php
													
													$cod = null;
													
													if(isset($_GET['nomeURL'])){
														$nomeURL = $_GET['nomeURL'];
													?>	
														<option value="<?php echo($cod)?>"> <?php echo($nomeURL)?> </option>
													<?php
													}else{
													?>
													<option value="" selected>Selecione um Item</option>
													<?php
													$sql_nois = "select * from tbl_categoria";
													$select_nois = mysql_query($sql_nois);
													while($rs = mysql_fetch_array($select_nois)){ ?>

													
													<option value="addnovoproduto.php?cod=<?php echo($rs['id_categoria'])?>&nomeURL=<?php echo($rs['categoria']) ?> "><?php echo($rs['categoria']) ?> </option> <?php
													
													}
													}
													?>
											</select>
										</td>
								</tr>
									<tr>
										<td class="tdzona">
											Sub Categoria
										</td>
										<td >
											<select class="td1" name="optfuncao">
												<option value="" selected>Selecione um Item</option>
												<?php
													 
													$cod = $_GET['cod'];
													$sql_vcs = "select * from tbl_subcategoria where id_categoria = '".$cod."'order by subcategoria desc" ;
													$select_vcs = mysql_query($sql_vcs);
													while($rs = mysql_fetch_array($select_vcs)){ ?>
													
													<option value="<?php echo($rs['id_subcategoria']) ?>" ><?php echo($rs['subcategoria']) ?> </option> <?php

													
													}
													?>
											</select>
										</td>
									</tr>
								<tr>
									<td class="td">
										Titulo da Corrida:
									</td>
									<td>
										<input class="input" name="txttitulo" value="" type="text" size="30">
									</td>
								</tr>
								<tr>
									<td class="td">
										Descrição:
									</td>
									<td>
										<input class="input" name="txtdescricao" value="" type="text" size="30">
									</td>
								</tr>
								<tr>
									<td class="td">
										Preço:
									</td>
									<td>
										<input class="input" name="txtpreco" value="" type="text" size="30">
									</td>
								</tr>
								
								<tr>
									<td class="td">
										Foto corrida:
									</td>
									<td>
										<input  name="filefotos"  type="file">
									</td>
								</tr>
								
								<tr>
									<td>
									
									</td>
									<td class="td">
										<input value="<?php echo($botao)?>" name="btn_salvar" type="submit">
									</td>
									<td>
										<input name="btnLimpar" type="reset" value="Limpar">
									</td>
								</tr>
							</table>
							
						</form>
					</div>
                    </div>
                </div>
            </div>
			<footer id="rodape">
				
			</footer>
		</div>
	</body>
</html>
