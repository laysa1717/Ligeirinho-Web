<?php
	
	/*Função que faz o upload da foto*/
	function teste (){
		echo ('teste');
	}
	
	
	
	function uploadFotos($sObj){
		$caminho="Imagens/";
		
		$nome_arquivo=basename($sObj['name']);
		
		$uploadfile=$caminho.$nome_arquivo;
		
		$extensao = strtolower (substr($nome_arquivo, strlen($nome_arquivo) -3,3)); 
		
		if($extensao == 'jpg' || $extensao == 'png'){
			
			if(move_uploaded_file($sObj['tmp_name'], $uploadfile)){
				return $uploadfile;
			}else{
				return false;
			}
		
		}
	}


?>