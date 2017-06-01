<html>
	<head>
		<title>Locais</title>
		<link rel="stylesheet" type="text/css" href="css/stylelocais.css">
		 
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
							<li><a href="locais.php">Locais</a></li>
							<li><a href="faleconosco.php">Fale Conosco</a></li>
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
		<section class="principal">
			
				<!-- Lateral -->
				
				<!-- Conteudo -->
				<div class="separadorconteudo">
					<div class="espacoproslide">
						<div class="container"> 
                            <figure>
                                <div class="slide">
                                    <img src="Imagens/img1.jpg">
                                </div>
                                <div class="slide">
                                    <img src="Imagens/img2.jpg">
                                </div>
                                <div class="slide">
                                    <img src="Imagens/img3.jpg">
                                </div>
                                <div class="slide">
                                    <img src="Imagens/img4.jpg">
                                </div>
                                <div class="slide">
                                    <img src="Imagens/img5.jpg">
                                </div>
                                <button class="btn" onclick="plusIndex(-1)" id="btn1">&#10094;</button>
                                <button  class="btn" onclick="plusIndex(1)" id="btn2">&#10095;</button>
                            </figure>
                        </div>
					</div>
				</div>
				<div class="produtos">
					<div class="conteudodiv">		
						<div class="decoracao">
						</div>
						<div class="titulo">
							CARNAVAL DAS CORES
						</div>
						
					</div>
					<div class="conteudodiv">		
						<div class="decoracao">
						</div>
						<div class="titulo">
							FANTASY RUN
						</div>
						
					</div>
					<div class="conteudodiv">		
						<div class="decoracao">
						</div>
						<div class="titulo">
							CIRCUITO ATHENAS
						</div>
						
					</div>
					<div class="conteudodiv">		
						<div class="decoracao">
						</div>
						<div class="titulo">
							NIGTH RUN
						</div>
						
					</div>
					
					<div class="conteudodiv">		
						<div class="decoracao">
						</div>
						<div class="titulo">
							BRAVUS RACE
						</div>
						
					</div>
					<div class="conteudodiv">		
						<div class="decoracao">
						</div>
						<div class="titulo">
							CITY MARATHON
						</div>
						
					</div>
				</div>
					
				<!-- Lateral -->
				
			</section>
			

		<footer class="rodape">
				
		<footer>
	</body>
	<script>
        var index = 1;
        
        function plusIndex(n){
            index = index + n;
            showImage(index);
            
        }
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
        autoSlide();
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