<?php
include('../menu/index.head.tpl.php');
include('../menu/index.body.tpl.php');
?>
<head>
	<link href="inclui.css" type="text/css" rel="stylesheet">
</head>
<form id="form" method="post" action="../usuario/">
	<div id="total">
		<p class="itens">Nome:</p> 
		<input type="text" name="nome">
		
		<p class="itens">E-mail:</p> 
		<input type="email" name="login">
		
		<p class="itens">Senha:</p> 
		<input type="password" name="senha">
		
		<p class="itens">Perfil:</p>	
		<select name="perfil">
			<option value="A">
				Administrador
			</option>
			<option value="C">
				Cliente
			</option>
		</select>
		
		<p class="itens">Ativo:</p> 
		<input type="checkbox" name="ativo" checked>
		
		<input type="submit" value="Gravar" name="btnNovoUsuario">	
	</div>
</form>
<?php
include('../menu/index.footer.tpl.php');
?>