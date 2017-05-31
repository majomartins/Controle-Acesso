<head>
	<link href="inclui.css" type="text/css" rel="stylesheet">
</head>
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
	
	<form id="form" method="post" action="../produto/index.php" enctype="multipart/form-data">

		<div id="total">	
		<p class="itens">Nome:</p>
		<input type="text" size="40" name="nome">
		
		<p class="itens">Descricao Produto:</p>
		<textarea size="40" id="textarea" rows="10" cols="50" name="descProduto"></textarea>
		
		<p class="itens">Preço Produto:</p>
		<input type="text" size="20" name="precProduto" >
		
		<p class="itens">Desconto Produto:</p> 
		<input type="text" size="20" name="descontoPromocao" >
		
		<p class="itens">Categoria:</p> 
		<input type="text" size="20" name="idCategoria">
		
		<p class="itens">Ativo:</p>
		<input type="checkbox" name="ativo">
				
			
		<p class="itens">qtdMinEstoque:</p>
		<input type="text" size="20" name="qtdMinEstoque">
		
		<p class="itens">Imagem:</p>
		<input type="file" name="imagejpg">
	
	<input type="submit" value="Gravar" name="btnNovoProduto">	
	</div>
	</form>
	
<?php
include('../menu/index.footer.tpl.php');
?>