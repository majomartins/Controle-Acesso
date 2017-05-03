<?php
include('../db/index.php');
include('../auth/controle_de_acesso.php');

if(isset($_REQUEST['acao'])){
	
	$acao = $_REQUEST['acao'];
	
	switch($acao){
		case 'incluir':
			include('incluir_usuario_tpl.php');
			break;
		case 'excluir':
			if(is_numeric($_GET['id'])){
				if($q = odbc_exec($db, "	DELETE FROM 
										Usuario
									WHERE
										idUsuario = {$_GET['id']}")){
					if(odbc_num_rows($q) > 0){
						$msg = "Usu&aacute;rio exclu&iacute;do com sucesso";
					}else{
						$erro = "Usu&aacute;rio n&atilde;o existe";
					}
				}else{
					$erro = "Erro ao excluir o usu&aacute;rio";
				}
			}else{
				$erro = "ID inv&aacute;lido";
			}
			
			$q = odbc_exec($db, 'SELECT 
									idUsuario,
									loginUsuario,
									nomeUsuario,
									tipoPerfil,
									usuarioAtivo
								FROM
									Usuario');
			$i = 0;							
			while($r = odbc_fetch_array($q)){
				$usuarios[$i] = $r;
				$i++;
			}
			include('lista_usuario_tpl.php');	
					
			break;
		
		case 'editar':
		
			$idUsuario = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';
		
			if(isset($_POST['btnGravarUsuario'])){
		
				//trata nome
				$nome = preg_replace(	"/[^a-zA-Z0-9 ]+/", 
								"", 
								$_POST['nome']);
		
				//trata email
				$email_exploded = 
				explode('@',$_POST['login']);
				$email_comeco = preg_replace(	"/[^a-z0-9._+-]+/i", "",$email_exploded[0]);
				$email_fim = preg_replace(	"/[^a-z0-9._+-]+/i", "",$email_exploded[1]);
				$email = $email_comeco.'@'.$email_fim;
				
				//trata senha
				$password = str_replace('"','',$_POST['senha']);
				$password = str_replace("'",'',$password);
				$password = str_replace(';','',$password);
				
				//trata perfil
				$perfil = 	$_POST['perfil'] != 'A' 
							&& $_POST['perfil'] != 'C' 
							? 'C' :	$_POST['perfil'];
				
				//trata ativo
				$_POST['ativo'] = 
				!isset($_POST['ativo']) ? 0 : $_POST['ativo'];
				$ativo = (bool) $_POST['ativo'];
				$ativo = $ativo === true ? 1 : 0;
				
				if(odbc_exec($db, "	UPDATE 
										Usuario
									SET
										loginUsuario = '$email',
										senhaUsuario = HASHBYTES('SHA1','$password'),
										nomeUsuario = '$nome',
										tipoPerfil = '$perfil',
										usuarioAtivo = $ativo
									WHERE
										idUsuario = $idUsuario")){
					$msg = "Usu&aacute;rio gravado com sucesso";					
				}else{
					$erro = "Erro ao gravar o usu&aacute;rio";
				}
			}
		
			$query_usuario
				= odbc_exec($db, 'SELECT 
									idUsuario,
									loginUsuario,
									nomeUsuario,
									tipoPerfil,
									usuarioAtivo
								FROM
									Usuario
								WHERE
									idUsuario = '.$idUsuario);
			$array_usuario 
				= odbc_fetch_array($query_usuario);
		
			include('editar_usuario_tpl.php');
			
			break;
		
		default:
			$erro = "A&ccedil;&atilde;o inv&aacute;lida";
	}
	
}else{

	//insere novo usuario
	if(isset($_POST['btnNovoUsuario'])){
		//trata nome
		$nome = preg_replace(	"/[^a-zA-Z0-9 ]+/", 
								"", 
								$_POST['nome']);
		//trata email
		$email_exploded = 
		explode('@',$_POST['login']);
		$email_comeco = preg_replace(	"/[^a-z0-9._+-]+/i", "",$email_exploded[0]);
		$email_fim = preg_replace(	"/[^a-z0-9._+-]+/i", "",$email_exploded[1]);
		$email = $email_comeco.'@'.$email_fim;
		
		//trata senha
		$password = str_replace('"','',$_POST['senha']);
		$password = str_replace("'",'',$password);
		$password = str_replace(';','',$password);
		
		//trata perfil
		$perfil = 	$_POST['perfil'] != 'A' 
					&& $_POST['perfil'] != 'C' 
					? 'C' :	$_POST['perfil'];
		
		//trata ativo
		$_POST['ativo'] = 
		!isset($_POST['ativo']) ? 0 : $_POST['ativo'];
		$ativo = (bool) $_POST['ativo'];
		$ativo = $ativo === true ? 1 : 0;
		
		if(odbc_exec($db, "	INSERT INTO
								Usuario
								(loginUsuario,
								senhaUsuario,
								nomeUsuario,
								tipoPerfil,
								usuarioAtivo)
							VALUES
								('$email',
					HASHBYTES('SHA1','$password'),
								'$nome',
								'$perfil',
								$ativo)")){
			$msg = "Usu&aacute;rio gravado com sucesso";					
		}else{
			$erro = "Erro ao gravar o usu&aacute;rio";
		}
	}

	$q = odbc_exec($db, 'SELECT 
							idUsuario,
							loginUsuario,
							nomeUsuario,
							tipoPerfil,
							usuarioAtivo
						FROM
							Usuario');
	$i = 0;							
	while($r = odbc_fetch_array($q)){
		$usuarios[$i] = $r;
		$i++;
	}
	include('lista_usuario_tpl.php');
}











?>