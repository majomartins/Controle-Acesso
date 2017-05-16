<?php
include('../menu/index.head.tpl.php');
include('../menu/index.body.tpl.php');
if(isset($erro)){
	echo "<center><font color='red'>
			$erro
			</font></center>";
}
if(isset($msg)){
	echo "<center><font color='green'>
			$msg
			</font></center>";
}
?>
<head>
<link href="stylesheet.css">
<meta charset="iso-8859-1">
</head>
<body>
<table>
	<tr	>
		<td>ID Usu&aacute;rio</td>
		<td>Login</td>
		<td>Nome</td>
		<td>Perfil</td>
		<td>Ativo</td>
		<td>
			<?php
			
			if($_SESSION['tipoPerfil'] == "A"){
			
			echo '<a href="?acao=incluir">';
			
			echo"<font color='green'>
			+ Novo Usu&aacute;rio
			</font>
			</a>";
			}else{
				echo "Novo Usuário";
			}
			?>
		</td>
	</tr>
	<?php
	if($_SESSION['tipoPerfil'] == "C"){
		foreach($usuarios as $usuario){
			echo "	<tr>
					<td>{$usuario['idUsuario']}</td>
					<td>{$usuario['loginUsuario']}</td>
					<td>{$usuario['nomeUsuario']}</td>
					<td>{$usuario['tipoPerfil']}</td>
					<td>{$usuario['usuarioAtivo']}</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					</tr>";
		} 		
	}else{
		foreach($usuarios as $usuario){
			echo "	<tr>
					<td>{$usuario['idUsuario']}</td>
					<td>{$usuario['loginUsuario']}</td>
					<td>{$usuario['nomeUsuario']}</td>
					<td>{$usuario['tipoPerfil']}</td>
					<td>{$usuario['usuarioAtivo']}</td>
					<td>
<a href='?acao=editar&id={$usuario['idUsuario']}'>					
					Editar</a>					
					</td>
					<td>
<a href='?acao=excluir&id={$usuario['idUsuario']}'>
						Excluir
						</a></td>
				</tr>";		
		}
	}
		
	
	
	?>
</table>
</body>

<?php
include('../menu/index.footer.tpl.php');
?>