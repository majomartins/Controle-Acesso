<!doctype html>
<html>
	<head>
	<title>Exemplos para a loja virtual</title>
	</head>
	<body>
		<center>
		<br><br>
		<?php
		if(isset($erro))
			echo "Erro";
		?>
		<br><br>
			<form method="POST">
				E-mail:
				<input type="text" name="email">
				<br>
				Senha
				<input type="password" name="senha">
				<br>
				<br>
				<input type="submit" value="Entrar" name="btn_entrar">
			</form>
		</center>
	</body>
</html>