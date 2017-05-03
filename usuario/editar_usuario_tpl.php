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

<form method="post" action="../usuario/"><br><br>
	Nome: <input type="text" name="nome" 
	value="<?php echo $array_usuario['nomeUsuario']; ?>"><br><br>
	E-mail: <input type="email" name="login"
	value="<?php echo $array_usuario['loginUsuario']; ?>"><br><br>
	Senha: <input type="password" name="senha"><br><br>
	Perfil:	<select name="perfil">
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
			</select><br><br>
	Ativo:
				<?php
				if($array_usuario['usuarioAtivo'] == 1){
					echo '<input type="checkbox" name="ativo" checked>';
				}else{
					echo '<input type="checkbox" name="ativo">';
				}
				?>
			<input type="hidden" name="id" value="<?php echo $array_usuario['idUsuario']; ?>">
			<input type="hidden" name="acao" value="editar">
		<br><br>
	<input type="submit" value="Gravar" name="btnGravarUsuario">	
</form>

<?php
include('../menu/index.footer.tpl.php');
?>