<?php
include('../menu/index.head.tpl.php');
include('../menu/index.body.tpl.php');

?>

<head>
	<link href="inclui.css" type="text/css" rel="stylesheet">	
</head>

<form id="form" method="post" action="../usuario/">

	<div id="total">

	<div>
	<?php
	if(isset($erro)){
	echo "<p id='erro'>".$erro."</p>";
	}
	if(isset($msg)){
		echo "<p id='mensagem'>".$msg."</p>";
	}
	?>	
	</div>
	
	<p class="itens">Nome:</p>
	<input type="text" name="nome" value="<?php echo $array_usuario['nomeUsuario']; ?>">
	
	<p class="itens">E-mail:</p> 
	<input type="email" name="login" value="<?php echo $array_usuario['loginUsuario']; ?>">
	
	<p class="itens">Senha:</p> 
	<input type="password" name="senha">
	
	<p class="itens">Perfil:</p>	
	<select name="perfil">
		<?php
			if($array_usuario['tipoPerfil'] == 'A'){
				echo '<option value="A" selected>
						Administrador
						</option>
						<option value="C">
						Cliente
						</option>';
			}else{
				echo '<option value="A">
						Administrador
						</option>
						<option value="C" selected>
						Cliente
						</option>';
				}
		?>
	</select>
	
	<p class="itens">Ativo:</p>
		<?php
			if($array_usuario['usuarioAtivo'] == 1){
				echo '<input type="checkbox" name="ativo" checked>';
			}else{
				echo '<input type="checkbox" name="ativo">';
			}
		?>
			
	<input type="hidden" name="id" value="<?php echo $array_usuario['idUsuario']; ?>">
	<input type="hidden" name="acao" value="editar">
	
	<input type="submit" value="Gravar" name="btnGravarUsuario">	
</div>
</form>

<?php
include('../menu/index.footer.tpl.php');
?>