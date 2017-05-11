<?php
ini_set ('odbc.defaultlrl', 9000000);
include('../db/index.php');
include('../auth/controle_de_acesso.php');

if(isset($_REQUEST['acao'])){
	
	$acao = $_REQUEST['acao'];
	
	switch($acao){
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////case INCLUIR
		case 'incluir':
			include('incluir_produto_tpl.php');
			break;
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////case EXCLUIR
		case 'excluir':
			if(is_numeric($_GET['id'])){
				if($q = odbc_exec($db, "	DELETE FROM 
										Produto
									WHERE
										idProduto = {$_GET['id']}")){
					if(odbc_num_rows($q) > 0){
						$msg = "Produto exclu&iacute;do com sucesso";
					}else{
						$erro = "Produto n&atilde;o existe";
					}
				}else{
					$erro = "Erro ao excluir o Produto";
				}
			}else{
				$erro = "ID inv&aacute;lido";
			}
			
			$q = odbc_exec($db, 'SELECT 
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
					
			break;
		
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////case EDITAR
		
		case 'editar':
		
			$idProduto = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
		
			if(isset($_POST['btnGravarProduto'])){
		
				//trata nome
				$nome = preg_replace("/[^a-zA-Z0-9]+/","",$_POST['nome']);
		
				//trata descProduto
				$descProduto = preg_replace("/[^a-zA-Z0-9]+/","",$_POST['descProduto']);
				
				//trata precProduto
				$precProduto = preg_replace("/[^0-9]/","",$_POST['precProduto']);
				
				//trata descontoPromocao
				$descontoPromocao = preg_replace("/[^0-9]/","",$_POST['descontoPromocao']);
				
				//trata categoria
				$idCategoria = preg_replace("/[^0-9]/","",$_POST['idCategoria']);
				
				//trata ativo
				$_POST['ativo'] = 
				!isset($_POST['ativo']) ? 0 : $_POST['ativo'];
				$ativo = (bool) $_POST['ativo'];
				$ativo = $ativo === true ? 1 : 0;
				
				//trata quantMinEstoque
				$qtdMinEstoque = preg_replace("/[^0-9]/","",$_POST['qtdMinEstoque']);
				
				//trataImagem
				$imagem = $_FILES['imagem'];
				
				var_dump($_FILES['imagem']);
				
				
				
				if(odbc_exec($db, "	UPDATE 
										Produto
									SET
										nomeProduto = '$nome',
										descProduto = '$descProduto'),
										precProduto = '$precProduto',
										descontoPromocao = '$descontoPromocao',
										idCategoria = '$idCategoria',
										ativoProduto = '$ativo'
										qtdMinEstoque = '$qtdMinEstoque',
										imagem = $imagem
									WHERE
										idProduto = $idProduto")){
					$msg = "Produto gravado com sucesso";					
				}else{
					$erro = "Erro ao gravar o Produto";
				}
			}
		
			$query_produto
				= odbc_exec($db, "SELECT 
									idProduto,
									nomeProduto,
									descProduto,
									precProduto,
									descontoPromocao,
									idCategoria,
									ativoProduto,
									qtdMinEstoque,
									imagem
								FROM
									Produto
								WHERE
									idProduto = $idProduto");
			
			$array_produto = odbc_fetch_array($query_produto);
		
			include('editar_produto_tpl.php');
			
			break;
		
		default:
			$erro = "A&ccedil;&atilde;o inv&aacute;lida";
	}
	
}else{

	//////////////////////////////////////////////////////////////////////////////////////////insere novo produto
	
	if(isset($_POST['btnNovoProduto'])){
				
				//trata nome
				$nome = preg_replace("/[^a-zA-Z0-9]+/","",$_POST['nome']);
		
				//trata descProduto
				$descProduto = preg_replace("/[^a-zA-Z0-9]+/","",$_POST['descProduto']);
				
				//trata precProduto
				$precProduto = preg_replace("/[^0-9]/","",$_POST['precProduto']);
				
				//trata descontoPromocao
				$descontoPromocao = preg_replace("/[^0-9]/","",$_POST['descontoPromocao']);
				
				//trata categoria
				$idCategoria = preg_replace("/[^0-9]/","",$_POST['idCategoria']);
				
				//trata ativo
				$_POST['ativo'] = 
				!isset($_POST['ativo']) ? 0 : $_POST['ativo'];
				$ativo = (bool) $_POST['ativo'];
				$ativo = $ativo === true ? 1 : 0;
				
				//trata quantMinEstoque
				$qtdMinEstoque = preg_replace("/[^0-9]/","",$_POST['qtdMinEstoque']);
				
				//trataImagem
				$imagem = $_FILES['imagem'];
				var_dump($_FILES);
		
		if(odbc_exec($db, "	INSERT INTO
								Produto
								(nomeProduto,
								descProduto,
								precProduto,
								descontoPromocao,
								idCategoria,
								ativoProduto,
								qtdMinEstoque,
								imagem)
							VALUES
								('$nome',
								'$descProduto',
								'$precProduto',
								'$descontoPromocao',
								'$idCategoria'
								'$ativo'
								'$qtdMinEstoque'
								'$imagem')")){
			$msg = "Produto gravado com sucesso";					
		}else{
			$erro = "Erro ao gravar o Produto";
		}
	}

	$query = odbc_exec($db, 'SELECT 
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
			while($r = odbc_fetch_array($query)){
				$produtos[$i] = $r;
				$i++;
			}
			include('lista_produto_tpl.php');
}


?>