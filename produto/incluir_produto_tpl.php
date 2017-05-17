<?php
include('../menu/index.head.tpl.php');
include('../menu/index.body.tpl.php');
?>
	<form method="post" action="../produto/" enctype="multipart/form-data"><br><br>
	
	Nome: 
	<input type="text" name="nome"><br><br>
	
	Descricao Produto: 
	<input type="text" name="descProduto"><br><br>
	
	Preço Produto: 
	<input type="text" name="precProduto" ><br><br>
	
	Desconto Produto: 
	<input type="text" name="descontoPromocao" ><br><br>
	
	Categoria: 
	<input type="text" name="idCategoria"><br><br>
	
	Ativo:
	<input type="checkbox" name="ativo">
				
	<input type="hidden" name="acao" value="incluir">
	
	<br><br>
		
	qtdMinEstoque:
	<input type="text" name="qtdMinEstoque"><br><br>
	
	Imagem:<input type="file" name="imagem"><br><br>
	
	<input type="submit" value="Gravar" name="btnNovoProduto">	

	</form>
<?php
include('../menu/index.footer.tpl.php');
?>