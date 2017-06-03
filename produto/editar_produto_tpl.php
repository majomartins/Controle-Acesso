<head>
	<link href="inclui.css" type="text/css" rel="stylesheet">
</head>
<?php
include('../menu/index.head.tpl.php');
include('../menu/index.body.tpl.php');
?>


<form id="form" method="post" action="../produto/index.php" enctype="multipart/form-data"> <br><br>
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
		<input class="valores"  type="text" size="40" name="nome" value="<?php echo $array_produto['nomeProduto']; ?>">
		
		<p class="itens">Descricao Produto:</p>
		<textarea size="40" id="textarea" rows="5" cols="60" name="descProduto"><?php echo $array_produto['descProduto']; ?></textarea>
		
		<p class="itens">Preço Produto:</p>
		<input class="valores"  type="text" size="20" name="precProduto" value="<?php echo number_format($array_produto['precProduto'],2,',','.'); ?>" >
		
		<p class="itens">Desconto Produto:</p> 
		<input class="valores"  type="text" size="20" name="descontoPromocao" value="<?php echo number_format($array_produto['descontoPromocao'],2,',','.'); ?>" >
		
		<p class="itens">Categoria:</p> 
		<input class="valores" type="text" size="20" name="idCategoria" value="<?php echo $array_produto['idCategoria']; ?>">
		
		<p class="itens">Ativo:</p>
					<?php
					if($array_produto['ativoProduto'] == 1){
						echo '<input type="checkbox" name="ativo" checked>';
					}else{
						echo '<input type="checkbox" name="ativo">';
					}
					?>
					
					
		<input type="hidden" name="id" value="<?php echo $array_produto['idProduto']; ?>">
		<input type="hidden" name="acao" value="editar">
		<input type="hidden" name="semimagem" value="<?php base64_encode($array_produto['imagem']); ?>">
		
		<p class="itens">qtdMinEstoque:</p>	
		<input class="valores"  type="text" size="20" name="qtdMinEstoque" value="<?php echo $array_produto['qtdMinEstoque']; ?>">
		
		<div id="campo"> 
		<?php
			echo "<img id='imagem' src='data:image/jpeg;base64,".base64_encode($array_produto['imagem'])."'>"
		?>
		</div>
		
		<p class="itens">Imagem:</p>
		<input class="valores"  type="file" name="imagejpg"></br>	
		
		<input  id="button" class="valores"  type="submit" value="Atualizar" name="btnGravarProduto">
	</div>
	
	</form>

<?php
include('../menu/index.footer.tpl.php');
?>