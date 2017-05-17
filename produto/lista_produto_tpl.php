<?php

include "../menu/index.head.tpl.php";
include "../menu/index.body.tpl.php";

?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	<table class="table">
	<thead>
		<tr>
			<td>Produto</td>
			<td>Nome</td>
			<td>Descrição</td>
			<td>Preço</td>
			<td>Promoção</td>
			<td>Categoria</td>
			<td>Ativo</td>
			<td>Usuario</td>
			<td>Estoque</td>
			<td>Imagem</td>
			<td>
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
		</thead>
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
							<td><img width = '100px' src='data:image/jpeg;base64,".base64_encode($produto['imagem'])."' /></td>	
							<td><a href='?acao=editar&id={$produto['idProduto']}'>Editar</a></td>
							<td><a href='?acao=excluir&id={$produto['idProduto']}'>Excluir</a></td>
						</tr>";		
			}
		}
		?>
	</table>
	</div>
</body>

<?php
	include('../menu/index.footer.tpl.php');
?>