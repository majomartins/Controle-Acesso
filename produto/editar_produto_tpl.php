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
	value="<?php echo $array_produto['nomeProduto']; ?>"><br><br>
	
	Descricao Produto: <input type="text" name="descProduto"
	value="<?php echo $array_produto['descProduto']; ?>"><br><br>
	
	Preço Produto: <input type="text" name="precProduto"
	value="<?php echo $array_produto['precProduto']; ?>"><br><br>
	
	Desconto Produto: <input type="text" name="descontoPromocao"
	value="<?php echo $array_produto['descontoPromocao']; ?>"><br><br>
	
	Categoria: <input type="text" name="idCategoria"
	value="<?php echo $array_produto['idCategoria']; ?>"><br><br>
	
	Ativo:
				<?php
				if($array_produto['ativoProduto'] == 1){
					echo '<input type="checkbox" name="ativo" checked>';
				}else{
					echo '<input type="checkbox" name="ativo">';
				}
				?>
				
			<input type="hidden" name="id" value="<?php echo $array_usuario['idProduto']; ?>">
			<input type="hidden" name="acao" value="editar">
		<br><br>
		
	qtdMinEstoque:<input type="text" name="qtdMinEstoque" 
	value="<?php echo $array_produto['qtdMinEstoque']; ?>"><br><br>
	
	Imagem:<input type="image" name="imagem" 
	value="<?php echo $array_produto['imagem']; ?>"><br><br>
	
	<input type="submit" value="Gravar" name="btnGravarProduto">	
</form>

<?php
include('../menu/index.footer.tpl.php');
?>