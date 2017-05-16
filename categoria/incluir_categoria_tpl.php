<?php
include('../menu/index.head.tpl.php');
include('../menu/index.body.tpl.php');
?>
	<form method="post" action="../categoria/"><br><br>
	
	Nome: 
	<input type="text" name="nomeCategoria"><br><br>
	
	Descricao Categoria: 
	<input type="text" name="descCategoria"><br><br>
	
	<input type="submit" value="Gravar" name="btnNovaCategoria">

	</form>
<?php
include('../menu/index.footer.tpl.php');
?>