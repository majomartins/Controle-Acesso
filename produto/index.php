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
					$erro = "Erro ao excluir o Poduto";
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
		
		
		
		
		case 'editar':
		
			$idProduto = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
		
			if(isset($_POST['btnGravarProduto'])){
		
				$nome = $_POST['nome'];
				
				$descProduto = $_POST['descProduto'];
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
				
				
				//trata imagem
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
				$res = odbc_execute($prepare,$parametro);
					
			}
		
			$query_usuario
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
			$array_produto 
				= odbc_fetch_array($query_usuario);
		
			include('editar_produto_tpl.php');
			
			break;
		
		default:
			$erro = "A&ccedil;&atilde;o inv&aacute;lida";
	}
	
}else{

	//insere novo usuario
	
	if(isset($_POST['btnNovoProduto'])){
		
				
				$nome = utf8_decode($_POST['nome']);
		
				//trata descProduto
				$descProduto = utf8_decode($_POST['descProduto']);
				
				//trata precProduto
				$precProduto = utf8_decode($_POST['precProduto']);
				
				//trata descontoPromocao
				$descontoPromocao = utf8_decode($_POST['descontoPromocao']);
				
				//trata categoria
				$idCategoria = utf8_decode($_POST['idCategoria']);
				
				//trata ativo
				$_POST['ativo'] = 
				!isset($_POST['ativo']) ? 0 : $_POST['ativo'];
				$ativo = (bool) $_POST['ativo'];
				$ativo = $ativo === true ? 1 : 0;
				
				//trata quantMinEstoque
				$qtdMinEstoque = utf8_decode($_POST['qtdMinEstoque']);
				
				//trataImagem
				$image = $_FILES['imagejpg']['tmp_name'];
				$imagem = fopen($image, "r");
				$conteudo = fread($imagem, filesize($image));
				
				
		
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
			$resposta = odbc_execute($prepare,$parametro); 
			

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