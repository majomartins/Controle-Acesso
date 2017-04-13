<!doctype html>
<html>
	<head>
	<title>Exemplos para a loja virtual</title>
	<link href="stylesheet.css" type="text/css" rel="stylesheet">
	</head>
	
	<body>
		<?php
		if(isset($erro))
			echo "Erro";
		?>
		<div class="login">
			<div class="login-triangle"></div>
  
			<h2 class="login-header">HIPPO</h2>
		
			<form class="login-container" method="POST">
			
				<p><input type="text" placeholder="Email" name="email"></p>
				<p><input type="password" placeholder="Password" name="senha"></p>
				<p><input type="submit" name="btn_entrar" value="Entrar"></p>
			</form>
		</div>
	</body>
</html>