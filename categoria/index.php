<?php
include('../db/index.php');
include('../auth/controle_de_acesso.php');

if(isset($_REQUEST['acao'])){
	
	$acao = $_REQUEST['acao'];
	
	switch($acao){
	
		case 'incluir':
			include('incluir_categoria_tpl.php');
			break;
				
				
		case 'excluir':
			
			if(is_numeric($_GET['id'])){
				if($_GET['id'] >= 1 && $_GET['id'] <= 6){
					$erro = "Esta categoria não pode ser excluída";
				}else{

				$sqlcategoria = "Select idCategoria from Produto";
				$queryidcategoria = odbc_exec($db,$sqlcategoria);

				while($linha = odbc_fetch_array($queryidcategoria)){
					
					if($_GET['id'] == $linha['idCategoria']){
						$contem = 0;
						$erro = "Esta categoria não pode ser excluída, devido ela conter produtos";
						break;
					}
				}
				
				if(empty($contem)){

				if($q = odbc_exec($db, "DELETE FROM 
											Categoria
										WHERE
										idCategoria = {$_GET['id']}")){
										if(odbc_num_rows($q) > 0){
										$msg = "Categoria excluída com sucesso";
					}else{
						$erro = "Categoria não existe";
					}
				}else{
					$erro = "Erro ao excluir a categoria";
				}
			}
				}
			}else{
				$erro = "ID inv&aacute;lido";
			}
			

			$q = odbc_exec($db, 'SELECT 
									idCategoria,
									nomeCategoria,
									descCategoria
								FROM
									Categoria');
			$i = 0;							
			while($r = odbc_fetch_array($q)){
				$categorias[$i] = $r;
				$i++;
			}
			include('lista_categoria_tpl.php');	
			

			break;
		
			
		

		
		case 'editar':
		
			$idCategoria = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
			
			if($_REQUEST['id'] >= 1 && $_REQUEST['id'] <= 6){
				$erro = "Esta categoria não pode ser editada";
			}else{
			
				if(isset($_POST['btnGravarCategoria'])){
					
					$nome = $_POST['nomeCategoria'];
					
					if(!empty($nome)){
						
						$descCategoria = $_POST['descCategoria'];
						
					
						$sql = "UPDATE 
									Categoria
								SET
									nomeCategoria = ?,
									descCategoria = ?
								WHERE
									idCategoria = ?";
								
						$prepare = odbc_prepare($db,$sql);
						$parametro = array($nome,$descCategoria,$idCategoria);
							if($res = odbc_execute($prepare,$parametro)){
								$msg = "<label id='mensagem'>Categoria editada com sucesso</label>";
							}else{
								$erro = "<label id='erro'>Erro ao editar a categoria</label>";
							}
							
								
					}else{
						$erro= "Preencha todos os campos obrigatórios";
					}
				}
			
			
			
				$query_categoria = odbc_exec($db, 'SELECT 
												idCategoria,
												nomeCategoria,
												descCategoria
											FROM
												Categoria
											WHERE
												idCategoria = '.$idCategoria);
				
				
				$array_categoria = odbc_fetch_array($query_categoria);
				include('editar_categoria_tpl.php');
				break;
			}
			
				$q = odbc_exec( $db, 'SELECT 
										idCategoria,
										nomeCategoria,
										descCategoria
									FROM
										Categoria');
			$i = 0;							
			while($r = odbc_fetch_array($q)){
				$categorias[$i] = $r;
				$i++;
			}
			
			include('lista_categoria_tpl.php');
		
		default:
			$erro = "A&ccedil;&atilde;o inv&aacute;lida";
	}
	
}else{

	
	if(isset($_POST['btnNovaCategoria'])){
				
		$nomeCategoria = $_POST['nomeCategoria'];
		$descCategoria = $_POST['descCategoria'];
				
		$sql = "INSERT INTO Categoria
					(nomeCategoria,descCategoria)
				VALUES
					(?,?)";
						
		$prepare = odbc_prepare($db,$sql);
		$parametros = array($nomeCategoria,$descCategoria);
		if($res = odbc_execute($prepare,$parametros)){
			$msg = "Categoria inserida com sucesso";
		}else{
			$erro = "Erro ao inserir a categoria";
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