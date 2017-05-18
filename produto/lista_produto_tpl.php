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
			<th>Produto</th>
			<th>Nome</th>
			<th>Descrição</th>
			<th>Preço</th>
			<th>Promoção</th>
			<th>Categoria</th>
			<th>Ativo</th>
			<th>Usuario</th>
			<th>Estoque</th>
			<th>Imagem</th>
			<th>
				<?php
					if($_SESSION['tipoPerfil'] == "A"){
				
						echo '<a href="?acao=incluir">';
				
						echo"<font colspan ='2' color='green'>
						+ Novo Produto
						</font>
						</a>";
					}else{
						echo "Novo Produto";
					}
				?>
			<th>
		<tr>
		</thead>
		<?php
		
		
		if($_SESSION['tipoPerfil'] == "C"){
			foreach($produtos as $produto){
				echo "	<tr>
							<td>".utf8_encode($produto['idProduto'])."</td>
							<td>".utf8_encode($produto['nomeProduto'])."</td>
							<td>".utf8_encode($produto['descProduto'])."</td>
							<td>".utf8_encode($produto['precProduto'])."</td>
							<td>".utf8_encode($produto['descontoPromocao'])."</td>
							<td>".utf8_encode($produto['idCategoria'])."</td>
							<td>".utf8_encode($produto['ativoProduto'])."</td>
							<td>".utf8_encode($produto['idUsuario'])."</td>
							<td>".utf8_encode($produto['qtdMinEstoque'])."</td>
							<td><img width = '100px' src='data:image/jpeg;base64,".base64_encode($produto['imagem'])."' /></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>";
			} 		
		}else{
			foreach($produtos as $produto){
								
				echo "	<tr>
							<td>".utf8_encode($produto['idProduto'])."</td>
							<td>".utf8_encode($produto['nomeProduto'])."</td>
							<td>".utf8_encode($produto['descProduto'])."</td>
							<td>".utf8_encode($produto['precProduto'])."</td>
							<td>".utf8_encode($produto['descontoPromocao'])."</td>
							<td>".utf8_encode($produto['idCategoria'])."</td>
							<td>".utf8_encode($produto['ativoProduto'])."</td>
							<td>".utf8_encode($produto['idUsuario'])."</td>
							<td>".utf8_encode($produto['qtdMinEstoque'])."</td>
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