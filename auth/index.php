<?php

session_start();

include ('../db/index.php'); // inclui a verificação de bando de dados


if( isset($_POST['email']) && 
	isset($_POST['senha'])) {
	
	$email = str_replace('"','',
			 str_replace("'",'',
			 str_replace(";",'',
			 str_replace("\\",'',
			 $_POST['email']))));//Proibe " ' ; \ 
	
	$senha = str_replace('"','',
			 str_replace("'",'',
			 str_replace(";",'',
			 str_replace("\\",'',
			 $_POST['senha']))));//Proibe " ' ; \ 
			 
			 
	$query = odbc_exec($db,"SELECT nomeUsuario, 
								   idUsuario, 
								   tipoPerfil
							FROM Usuario
							WHERE 
								   loginUsuario = '$email'
							AND
								   senhaUsuario = HASHBYTES('SHA1','$senha')");
	$result = odbc_fetch_array($query);
			 
	if(!empty($result['idUsuario']) && !empty($result['tipoPerfil'])){
		
		$_SESSION['idUsuario'] =
		$result['idUsuario'];
		$_SESSION['tipoPerfil'] =
		$result['tipoPerfil'];
		$_SESSION['nomeUsuario'] =
		$result['nomeUsuario'];
		
		header ("Location:../menu");
	}else{
		
		$erro = 'Email ou senha Incorretos';
		
	}
	
	
	
	
	}

include "index.tpl.php"; // inclui o form

?>