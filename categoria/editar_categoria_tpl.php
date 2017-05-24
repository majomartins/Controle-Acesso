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

<form method="post" action="../categoria/"><br><br>
	
	Nome: 
	<input type="text" name="nomeCategoria" value="<?php echo $array_categoria['nomeCategoria']; ?>"><br><br>
	
	Descrição Categoria: 
	<input type="text" name="descCategoria" value="<?php echo $array_categoria['descCategoria']; ?>"><br><br>
				
	<input type="hidden" name="id" value="<?php echo $array_categoria['idCategoria']; ?>">
	<input type="hidden" name="acao" value="editar">
	
	<br><br>
	
	<input type="submit" value="Gravar" name="btnGravarCategoria">	

	</form>

<?php
include('../menu/index.footer.tpl.php');
?>