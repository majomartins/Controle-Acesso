<?php

include "../menu/index.head.tpl.php";
include "../menu/index.body.tpl.php";

?>
<head>
	<title>Lista produto</title>
	<meta charset="iso-8859-1">
</head>	
<body>
	<table border="1">
		<tr>
			<td>IdProduto</td>
			<td>NomeProduto</td>
			<td>DescProduto</td>
			<td>PrecProduto</td>
			<td>DescPromocao</td>
			<td>IdCategoria</td>
			<td>AtivoProduto</td>
			<td>IdUsuario</td>
			<td>Estoque</td>
			<td>Imagem</td>
			<td colspan="2" align="center">
				<?php
					if($_SESSION['tipoPerfil'] == "A"){
				
						echo '<a href="?acao=incluir">';
				
						echo"<font color='green'>
						+ Novo Produto
						</font>
						</a>";
					}else{
						echo "Novo Produto";
					}
				?>
			<td>
		<tr>
		<?php
		
		
		if($_SESSION['tipoPerfil'] == "C"){
			foreach($produtos as $produto){
				echo "	<tr>
						<td>{$produto['idProduto']}</td>
						<td>{$produto['nomeProduto']}</td>
						<td>{$produto['descProduto']}</td>
						<td>{$produto['precProduto']}</td>
						<td>{$produto['descontoPromocao']}</td>
						<td>{$produto['idCategoria']}</td>
						<td>{$produto['ativoProduto']}</td>
						<td>{$produto['idUsuario']}</td>
						<td>{$produto['qtdMinEstoque']}</td>
							imagem
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						</tr>";
			} 		
		}else{
			header("Content-type: text/html; charset=iso-8859-1");
			foreach($produtos as $produto){
								
				echo "	<tr>
							<td>{$produto['idProduto']}</td>
							<td>{$produto['nomeProduto']}</td>
							<td>{$produto['descProduto']}</td>
							<td>{$produto['precProduto']}</td>
							<td>{$produto['descontoPromocao']}</td>
							<td>{$produto['idCategoria']}</td>
							<td>{$produto['ativoProduto']}</td>
							<td>{$produto['idUsuario']}</td>
							<td>{$produto['qtdMinEstoque']}</td>
							<td><img width='200' src='data:image/jpeg;base64,".base64_encode($produto['imagem'])."' /></td>	
							<td><a href='?acao=editar&id={$produto['idProduto']}'>Editar</a></td>
							<td><a href='?acao=excluir&id={$produto['idProduto']}'>Excluir</a></td>
						</tr>";		
			}
		}
		?>
	</table>
</body>

<?php
	include('../menu/index.footer.tpl.php');
?>