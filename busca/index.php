<?php
	include "../auth/controle_de_acesso.php";
	include "../db/index.php";
	
	if(isset($_GET['busca'])){
		$busca = $_GET['busca'];
		
		$queryproduto = odbc_exec($db, "SELECT nomeProduto,descProduto FROM Produto
										where nomeProduto like '%".$busca."%' 
										or descProduto like '%".$busca."%'");
	
	
	
		$i = 0;							
		while($r = odbc_fetch_array($queryproduto)){
			$buscasp[$i] = $r;
			$i++;
		}
		
		$querycategoria = odbc_exec($db, "SELECT nomeCategoria FROM Categoria
										  where nomeCategoria like '%".$busca."%'");
	
	
	
		$i = 0;							
		while($r = odbc_fetch_array($querycategoria)){
			$buscasc[$i] = $r;
			$i++;
		}
		
		$queryusuario = odbc_exec($db, "SELECT nomeUsuario FROM Usuario
										where nomeUsuario like '%".$busca."%'");
	
	
	
		$i = 0;							
		while($r = odbc_fetch_array($queryusuario)){
			$buscasu[$i] = $r;
			$i++;
		}
		
	
	
/*
	SELECT nomeCategoria from Categoria
where nomeCategoria like '%j%'

SELECT nomeProduto, descProduto from Produto
where nomeProduto like '%j%' 
and descProduto like '%j%'

SELECT nomeUsuario from Usuario
where nomeUsuario like '%j%' */






include('lista_busca_tpl.php');
}
?>