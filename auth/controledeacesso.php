<?php
	session_start();
	
	if(!isset($_SESSION['idUsuario']) || !isset($_SESSION['tipoPerfil']) || !isset($_SESSION['nomeUsuario'])){
		session_destroy();
		header("location:../index.tpl.php");
		exit();
	}
?>