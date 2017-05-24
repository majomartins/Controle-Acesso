<?php 

			$q = odbc_exec( $db, 'SELECT 
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
								FROM
									Produto');
			$i = 0;							
			while($r = odbc_fetch_array($q)){
				$produtos[$i] = $r;
				$i++;
			}
			
			include('lista_produto_tpl.php');

?>			