<?php

include "../menu/index.head.tpl.php";
include "../menu/index.body.tpl.php";

?>
<body>
	<table width="100%">
		<tr>
			<td>IdCategoria</td>
			<td>NomeCategoria</td>
			<td>DescCategoria</td>
			<td colspan="2" align="center">
				<?php
					if($_SESSION['tipoPerfil'] == "A"){
				
						echo '<a href="?acao=incluir">';
				
						echo"<font color='green'>
						+ Nova Categoria
						</font>
						</a>";
					}else{
						echo "Editar Categoria";
					}
				?>
			<td>
		<tr>
		<?php
		
		
		if($_SESSION['tipoPerfil'] == "C"){
			foreach($categorias as $categoria){
				echo "	<tr>
						<td>{$categoria['idCategoria']}</td>
						<td>{$categoria['nomeCategoria']}</td>
						<td>{$categoria['descCategoria']}</td>";
			} 		
		}else{
			
			foreach($categorias as $categoria){
								
				echo "	<tr>
							<td>{$categoria['idCategoria']}</td>
							<td>{$categoria['nomeCategoria']}</td>
							<td>{$categoria['descCategoria']}</td>
							<td><a href='?acao=editar&id={$categoria['idCategoria']}'>Editar</a></td>
							<td><a href='?acao=excluir&id={$categoria['idCategoria']}'>Excluir</a></td>
						</tr>";		
			}
		}
		?>
	</table>
</body>

<?php
	include('../menu/index.footer.tpl.php');
?>