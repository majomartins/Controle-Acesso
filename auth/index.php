<?php

session_start();

include('../db/index.php');

if(	isset($_POST['email']) && 
	isset($_POST['senha'])){

	$email = 	str_replace('"','',
				str_replace("'",'',
				str_replace(';','',
				str_replace("\\",'',
				$_POST['email']))));
	$senha =	str_replace('"','',
				str_replace("'",'',
				str_replace(';','',
				str_replace("\\",'',
				$_POST['senha']))));
	
	$query = odbc_exec($db, 
					"SELECT 
					nomeUsuario,
					idUsuario, tipoPerfil 
					FROM Usuario
					WHERE 
					loginUsuario = '$email'
					AND
					senhaUsuario = HASHBYTES('SHA1','$senha')");
	$result = odbc_fetch_array($query);
	
	if(	!empty($result['idUsuario']) 	&&
		!empty($result['tipoPerfil'])){
		
		$_SESSION['idUsuario'] = $result['idUsuario'];
		$_SESSION['tipoPerfil'] = $result['tipoPerfil'];
		$_SESSION['nomeUsuario'] = $result['nomeUsuario'];
				
		header('Location: ../menu/');
		
	}else{
		$erro = 'Email ou Senha Incorretos';
	}
}

include('index.tpl.php');
?>