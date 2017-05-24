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
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">

<table class="table">
	<thead>
	<tr>
		<th>ID Usu&aacute;rio</th>
		<th>Login</th>
		<th>Nome</th>
		<th>Perfil</th>
		<th>Ativo</th>
		<th>
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
		</th>
	</tr>
	</thead>
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
</div>
</body>

<?php
include('../menu/index.footer.tpl.php');
?>