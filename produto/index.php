<?php
ini_set ('odbc.defaultlrl', 9000000);
include "../auth/controle_de_acesso.php";
include"../db/index.php";

if(isset($_REQUEST['acao'])){
	
	$acao = $_REQUEST['acao'];
	
	switch($acao){
		case 'incluir':
			include('incluir_produto_tpl.php');
			break;
				
		
		
		
		case 'excluir':
			if(is_numeric($_GET['id'])){
				if($q = odbc_exec($db, "DELETE FROM Produto
										WHERE idProduto = {$_GET['id']}")){
											if(odbc_num_rows($q) > 0){
												$msg = "Produto exclu&iacute;do com sucesso";
											}else{
												$erro = "Produto n&atilde;o existe";
											}
				}else{
					$erro = "Erro ao excluir o Poduto";
				}
			}else{
				$erro = "ID inv&aacute;lido";
			}
			
			include "repetidos/queryproduto.php";
					
			break;
		
		
		
		
		case 'editar':
		
			$idProduto = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
			if(isset($_POST['btnGravarProduto'])){
		
				$nome = $_POST['nome'];
				$descProduto = $_POST['descProduto'];
				$precProduto = preg_replace("/[^0-9]/","",$_POST['precProduto']);
				$descontoPromocao = preg_replace("/[^0-9]/","",$_POST['descontoPromocao']);
				$idCategoria = preg_replace("/[^0-9]/","",$_POST['idCategoria']);
				$_POST['ativo'] = !isset($_POST['ativo']) ? 0 : $_POST['ativo'];$ativo = (bool) $_POST['ativo'];$ativo = $ativo === true ? 1 : 0;
				$qtdMinEstoque = preg_replace("/[^0-9]/","",$_POST['qtdMinEstoque']);
				//Prepara Imagem
				$image = $_FILES['imagejpg']['tmp_name']; $imagem = fopen($image, "r"); $conteudo = fread($imagem, filesize($image));
				
				$sql = "UPDATE 
							Produto
						SET
							nomeProduto = ?,
							descProduto = ?,
							precProduto = ?,
							descontoPromocao = ?,
							idCategoria = ?,
							ativoProduto = ?,
							qtdMinEstoque = ?,
							imagem = ?
						WHERE
							idProduto = ?";
					
				$prepare = odbc_prepare($db,$sql);
				$parametro = array($nome,$descProduto,$precProduto,$descontoPromocao,$idCategoria,$ativo,$qtdMinEstoque,$conteudo,$idProduto);
					if($res = odbc_execute($prepare,$parametro)){
						$msg = "gravado";
					}else{
						$erro = "erro ao gravar";
					}
					
			}
		
			$query_produto
				= odbc_exec($db, 'SELECT 
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
									Produto
								WHERE
									idProduto = '.$idProduto);
			
			$array_produto = odbc_fetch_array($query_produto);
			include('editar_produto_tpl.php');
			break;
		
		default:
			$erro = "A&ccedil;&atilde;o inv&aacute;lida";
	}
	
}else{

	//insere novo produto
	
	if(isset($_POST['btnNovoProduto'])){
			
			$nome = empty($_POST['nome']) ? 'joan' : $_POST['nome'];
			
			$descProduto = $_POST['descProduto'];
			$descProduto = empty($descProduto) ? null : $descProduto;
			
			$precProduto = preg_replace("/[^0-9]/","",$_POST['precProduto']);
			$precProduto = empty($precProduto) ? null : $precProduto;
			
			$descontoPromocao = preg_replace("/[^0-9]/","",$_POST['descontoPromocao']);
			$descontoPromocao = empty($descontoPromocao) ? null : $descontoPromocao;
			
			$idCategoria = preg_replace("/[^0-9]/","",$_POST['idCategoria']);
			$idCategoria = empty($idCategoria) ? null : $idCategoria;
			
			$_POST['ativo'] = !isset($_POST['ativo']) ? 0 : $_POST['ativo'];
			$ativo = (bool) $_POST['ativo'];
			$ativo = $ativo === true ? 1 : 0;
			
			$qtdMinEstoque = preg_replace("/[^0-9]/","",$_POST['qtdMinEstoque']);
			$qtdMinEstoque = empty($qtdMinEstoque) ? null : $qtdMinEstoque;
			
			//Prepara imagem
			if(empty($_FILES['imagejpeg'])){
				$conteudo = null;
			}else{
				$image = $_FILES['imagejpg']['tmp_name']; 
				$imagem = fopen($image, "r"); 
				$conteudo = fread($imagem, filesize($image));
			}
			
			
			
				
			$sql = "INSERT INTO Produto
					(nomeProduto,
					descProduto,
					precProduto,
					descontoPromocao,
					idCategoria,
					ativoProduto,
					qtdMinEstoque,
					imagem)
				VALUES
					(?,?,?,?,?,?,?,?)";
			
			$prepare = odbc_prepare($db,$sql);
			$parametro = array($nome,$descProduto,$precProduto,$descontoPromocao,$idCategoria,$ativo,$qtdMinEstoque,$conteudo);
			
			if($resposta = odbc_execute($prepare,$parametro)){
				echo "Produto inserido com sucesso";
			}else{
				echo "Erro ao inserir o produto";
			}
	}
			include "repetidos/queryproduto.php";

	
}

?>