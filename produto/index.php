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
				if($_GET['id'] >= 1 && $_GET['id'] <= 10){
					$erro = "<label id='erro'>Este produto não pode ser excluído</label>";
				}else{
					if($q = odbc_exec($db, "DELETE FROM Produto
										WHERE idProduto = {$_GET['id']}")){
											if(odbc_num_rows($q) > 0){
												$msg = "<label id='mensagem'>Produto exclu&iacute;do com sucesso</label>";
											}else{
												$erro = "<label id='erro'>Produto n&atilde;o existe</label>";
											}
					}else{
						$erro = "<label id='erro'>Erro ao excluir o Poduto</label>";
					}
				}
			}else{
				$erro = "<label id='erro'>ID inv&aacute;lido</label>";
			}
			
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
					
			break;
		
		
		
		
		case 'editar':
		
			$idProduto = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
			
			if($_REQUEST['id'] >= 1 && $_REQUEST['id'] <= 10){
				$erro = "<label id='erro'>Este produto não pode ser editado</label>";
			}else{
			
				if(isset($_POST['btnGravarProduto'])){
					
					$precProduto = preg_replace("/[^0-9]/","",$_POST['precProduto']);
					$idCategoria = preg_replace("/[^0-9]/","",$_POST['idCategoria']);
					$nome = $_POST['nome'];
					
					if(!empty($nome) && !empty($idCategoria) && !empty($precProduto)){
						
						$descProduto = $_POST['descProduto'];
						$descProduto = empty($descProduto) ? null : $descProduto;

						$descontoPromocao = preg_replace("/[^0-9]/","",$_POST['descontoPromocao']);
						$descontoPromocao = empty($descontoPromocao) ? null : $descontoPromocao;

						if(strlen($precProduto) > 14 || strlen($descontoPromocao) > 14){
							$erro = "Valores muito altos";
						}else{
						
						$_POST['ativo'] = !isset($_POST['ativo']) ? 0 : $_POST['ativo'];
						$ativo = (bool) $_POST['ativo'];
						$ativo = $ativo === true ? 1 : 0;
						
						$qtdMinEstoque = preg_replace("/[^0-9]/","",$_POST['qtdMinEstoque']);
						$qtdMinEstoque = empty($qtdMinEstoque) ? null : $qtdMinEstoque;
						
						//Prepara imagem
						if(empty($_FILES['imagejpg']['tmp_name'])){

							$sql = "UPDATE 
									Produto
								SET
									nomeProduto = ?,
									descProduto = ?,
									precProduto = ?,
									descontoPromocao = ?,
									idCategoria = ?,
									ativoProduto = ?,
									qtdMinEstoque = ?
								WHERE
									idProduto = ?";
								
							$prepare = odbc_prepare($db,$sql);
							$parametro = array($nome,$descProduto,$precProduto,$descontoPromocao,$idCategoria,$ativo,$qtdMinEstoque,$idProduto);
							if($res = odbc_execute($prepare,$parametro)){
								$msg = "<label id='mensagem'>Produto editado com sucesso</label>";
							}else{
								$erro = "<label id='erro'>Erro ao editar o produto</label>";
							}
						

						}else{
							
							$image = $_FILES['imagejpg']['tmp_name']; 
							$imagem = fopen($image, "r"); 
							$conteudo = fread($imagem, filesize($image));
						

							
							
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
								$msg = "<label id='mensagem'>Produto editado com sucesso</label>";
							}else{
								$erro = "<label id='erro'>Erro ao editar o produto</label>";
							}

						}
						}
								
					}else{
						$erro= "Preencha todos os campos obrigatórios";
					}
				}
			
			
			
				$query_produto = odbc_exec($db, 'SELECT 
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
			}
			
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
		default:
			$erro = "<label id='erro'>A&ccedil;&atilde;o inv&aacute;lida</label>";
	}
	
}else{

	//insere novo produto
	
	if(isset($_POST['btnNovoProduto'])){
		
			$precProduto = preg_replace("/[^0-9]/","",$_POST['precProduto']);
			$idCategoria = preg_replace("/[^0-9]/","",$_POST['idCategoria']);
			$nome = $_POST['nome'];

			if(!empty($_POST['nome']) && !empty($idCategoria) && !empty($precProduto)){
			
			$descProduto = $_POST['descProduto'];
			$descProduto = empty($descProduto) ? null : $descProduto;
			
			
			$descontoPromocao = preg_replace("/[^0-9]/","",$_POST['descontoPromocao']);
			$descontoPromocao = empty($descontoPromocao) ? null : $descontoPromocao;
			
			
			$_POST['ativo'] = !isset($_POST['ativo']) ? 0 : $_POST['ativo'];
			$ativo = (bool) $_POST['ativo'];
			$ativo = $ativo === true ? 1 : 0;
			
			$qtdMinEstoque = preg_replace("/[^0-9]/","",$_POST['qtdMinEstoque']);
			$qtdMinEstoque = empty($qtdMinEstoque) ? null : $qtdMinEstoque;
			
			//Prepara imagem
			if(empty($_FILES['imagejpg']['tmp_name'])){
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
				$msg = "<label id='mensagem'>Produto inserido com sucesso</label>";
			}else{
				$erro = "<label id='erro'>Erro ao inserir o produto</label>";
			}
			}else{
				$erro = "<label id='erro'>Preencha todos os campos obrigatórios</label>";
			}
	}
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

	
}

?>