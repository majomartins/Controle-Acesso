<?php
	include "../auth/controle_de_acesso.php";
	include "../db/index.php";
	
	if(isset($_GET['busca'])){ 
		
		if(!empty($_GET['busca'])){
			$busca = $_GET['busca'];
		
			if($queryproduto = odbc_exec($db, "SELECT nomeProduto,descProduto FROM Produto
										where nomeProduto like '%".$busca."%' 
										or descProduto like '%".$busca."%'")){
				if(odbc_num_rows($queryproduto) == 0		){
					$msg = "Não há nenhum produto com esse nome";
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