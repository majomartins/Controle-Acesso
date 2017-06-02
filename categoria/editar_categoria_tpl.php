<?php
include('../menu/index.head.tpl.php');
include('../menu/index.body.tpl.php');

?>
<head>
	<link href="inclui.css" type="text/css" rel="stylesheet">	
</head>
<form id="form" method="post" action="../categoria/">
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
	<input type="text" name="nomeCategoria" value="<?php echo $array_categoria['nomeCategoria']; ?>">
	
	<p class="itens">Descrição Categoria:</p>
	<input type="text" name="descCategoria" value="<?php echo $array_categoria['descCategoria']; ?>">
				
	<input type="hidden" name="id" value="<?php echo $array_categoria['idCategoria']; ?>">
	<input type="hidden" name="acao" value="editar">
	
	<input type="submit" value="Gravar" name="btnGravarCategoria">	
	</div>
	</form>

<?php
include('../menu/index.footer.tpl.php');
?>