<?php
	include "../auth/controle-de-acesso.php";
	include "../db/index.php";
	
	if(isset($_GET['busca'])){
		$busca = $_GET['busca'];

		$sql = "SELECT nomeProduto, descProduto from Produto
				where nomeProduto like '%?%' 
				and descProduto like '%?%""" ;

		$prepare = odbc_prepare($db,$sql);
		$params = array($busca,$busca);
		$retorno = ($prepare,$params);
		
	

	$i = 0;
	while($query_busca_produto = odbc_fetch_array($retorno)){
			$buscas[$i] = $query_busca;
			$i++;

	}

	include "lista_busca_tpl.php";


	
?>

SELECT nomeCategoria from Categoria
where nomeCategoria like '%j%'

SELECT nomeProduto, descProduto from Produto
where nomeProduto like '%j%' 
and descProduto like '%j%'

SELECT nomeUsuario from Usuario
where nomeUsuario like '%j%'