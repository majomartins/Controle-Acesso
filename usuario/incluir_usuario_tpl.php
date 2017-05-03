<?php
include('../menu/index.head.tpl.php');
include('../menu/index.body.tpl.php');
?>
<form method="post" action="../usuario/"><br><br>
	Nome: <input type="text" name="nome"><br><br>
	E-mail: <input type="email" name="login"><br><br>
	Senha: <input type="password" name="senha"><br><br>
	Perfil:	<select name="perfil">
				<option value="A">
					Administrador
				</option>
				<option value="C">
					Cliente
				</option>
			</select><br><br>
	Ativo: <input type="checkbox" name="ativo" checked><br><br>
	<input type="submit" value="Gravar" name="btnNovoUsuario">	
</form>
<?php
include('../menu/index.footer.tpl.php');
?>