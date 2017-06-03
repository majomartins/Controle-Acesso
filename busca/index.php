<?php
	include "../auth/controle_de_acesso.php";
	include "../db/index.php";
	
	if(isset($_GET['busca'])){ 
		
		if(!empty($_GET['busca'])){
			$busca = $_GET['busca'];
		
			if($queryproduto = odbc_exec($db, "SELECT 
													idProduto,
													nomeProduto,
													descProduto,
													precProduto,
													descontoPromocao,
													idCategoria,
													ativoProduto,
													idUsuario,
													qtdMinEstoque,
													imagem
												FROM Produto
										        WHERE nomeProduto like '%".$busca."%' 
											    or descProduto like '%".$busca."%'
											    or idProduto like '%".$busca."%'")){
				
				if(odbc_num_rows($queryproduto) == 0){
					$msg = "Nenhum produto foi encontrado";
				}
			}
	
	
		$i = 0;							
		while($r = odbc_fetch_array($queryproduto)){
			$buscasp[$i] = $r;
			$i++;
		}
			
		include('lista_busca_tpl.php');
		
		}else{
			$msg = "Digite uma busca válida";
			include('lista_busca_tpl.php');	
		}
}
?>