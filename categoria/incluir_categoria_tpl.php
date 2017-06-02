<?php
include('../menu/index.head.tpl.php');
include('../menu/index.body.tpl.php');
?>
	
<head>
	<link href="inclui.css" type="text/css" rel="stylesheet">
</head>

	<form id="form"method="post" action="../categoria/"><br><br>
	<div id="total">
	<p class="itens">Nome:</p>
	<input type="text" name="nomeCategoria"><br><br>
	
	<p class="itens">Descricao Categoria:</p>
	<input type="text" name="descCategoria"><br><br>
	
	<input type="submit" value="Gravar" name="btnNovaCategoria">
	</div>
	</form>
<?php
include('../menu/index.footer.tpl.php');
?>