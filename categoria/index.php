<?php
include('../db/index.php');
include('../auth/controle_de_acesso.php');

if(isset($_REQUEST['acao'])){
	
	$acao = $_REQUEST['acao'];
	
	switch($acao){
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////case INCLUIR
		case 'incluir':
			include('incluir_categoria_tpl.php');
			break;
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////case EXCLUIR
		case 'excluir':
			if(is_numeric($_GET['id'])){
				if($q = odbc_exec($db, "	DELETE FROM 
										Categoria
									WHERE
										idCategoria = {$_GET['id']}")){
					if(odbc_num_rows($q) > 0){
						$msg = "Categoria exclu&iacute;da com sucesso";
					}else{
						$erro = "Categoria n&atilde;o existe";
					}
				}else{
					$erro = "Erro ao excluir a Categoria";
				}
			}else{
				$erro = "ID inv&aacute;lido";
			}
			
			$query = odbc_exec($db, 'SELECT 
									idCategoria,
									nomeCategoria,
									descCategoria
								FROM
									Categoria');
			
			$i = 0;							
			while($r = odbc_fetch_array($query)){
				$categorias[$i] = $r;
				$i++;
			}
			
			include('lista_categoria_tpl.php');	
					
			break;
		
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////case EDITAR
		
		case 'editar':
		
			$idCategoria = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
		
			if(isset($_POST['btnGravarCategoria'])){
		
				//trata nome
				$nomeCategoria = preg_replace("/[^a-zA-Z0-9]+/","",$_POST['nomeCategoria']);
		
				//trata descProduto
				$descCategoria = preg_replace("/[^a-zA-Z0-9]+/","",$_POST['descCategoria']);
				
				if(odbc_exec($db, "	UPDATE 
										Categoria
									SET
										nomeCategoria = '$nomeCategoria',descCategoria = '$descCategoria'
									WHERE
										idCategoria = '$idCategoria'")){
					$msg = "Categoria gravada com sucesso";					
				}else{
					$erro = "Erro ao gravar a Categoria";
				}
			}
		
			$query_categoria = odbc_exec($db, "SELECT 
													idCategoria,
													nomeCategoria,
													descCategoria
											   FROM
													Categoria
											   WHERE
													idCategoria = $idCategoria");
			
			$array_categoria = odbc_fetch_array($query_categoria);
		
			include('editar_categoria_tpl.php');
			
			break;
		
		default:
			$erro = "A&ccedil;&atilde;o inv&aacute;lida";
	}
	
}else{

	//////////////////////////////////////////////////////////////////////////////////////////insere novo produto
	
	if(isset($_POST['btnNovaCategoria'])){
				
				//trata nome
				$nomeCategoria = preg_replace("/[^a-zA-Z0-9]+/","",$_POST['nomeCategoria']);
		
				//trata descProduto
				$descCategoria = preg_replace("/[^a-zA-Z0-9]+/","",$_POST['descCategoria']);
				
		
		if(odbc_exec($db, "	INSERT INTO
								Categoria
								(nomeCategoria,descCategoria)
							VALUES
								('$nomeCategoria','$descCategoria')")){
			
			$msg = "Categoria gravada com sucesso";					
		}else{
			$erro = "Erro ao gravar a Categoria";
		}
	}

	$query = odbc_exec($db, 'SELECT 
									idCategoria,
									nomeCategoria,
									descCategoria
								FROM
									Categoria');
			$i = 0;							
			while($r = odbc_fetch_array($query)){
				$categorias[$i] = $r;
				$i++;
			}
			include('lista_categoria_tpl.php');
}


?>