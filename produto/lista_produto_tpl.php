<?php

include "../menu/index.head.tpl.php";
include "../menu/index.body.tpl.php";

?>
<body>
	<center>
	<table class="table" width="90%">
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
								
				echo "  
						
						<tr>
							<td width='10%'><label class='cabecalhos'>ID Produto:</label>".utf8_encode($produto['idProduto'])."</td>
							<td rowspan='5' width='30%'>".utf8_encode($produto['descProduto'])."</td>
							<td rowspan ='5' width='10%'><img width='150px'src='data:image/jpeg;base64,".base64_encode($produto['imagem'])."' /></td>
							<td width='10%'><label class='cabecalhos'>Preço:</label>".utf8_encode($produto['precProduto'])."</td>
							<td rowspan ='2' width='5%'><a href='?acao=editar&id={$produto['idProduto']}'>Editar</a></td>
						</tr>
						
						<tr>
							<td width='15%'>".utf8_encode($produto['nomeProduto'])."</td>
							<td width='10%'><label class='cabecalhos'>Desconto: </label>".utf8_encode($produto['descontoPromocao'])."</td>
							
							
						</tr>
						
						<tr>
						
						<tr>
							<td><label class='cabecalhos'>Ativo:</label>".utf8_encode($produto['ativoProduto'])."</td>
							<td width='10%'><label class='cabecalhos'>Categoria:</label>".utf8_encode($produto['idCategoria'])."</td>
							<td rowspan='2' width='5%'><a href='?acao=excluir&id={$produto['idProduto']}'>Excluir</a></td>
						</tr>
						
						<tr>	
							<td><label class='cabecalhos'>Usuário:</label>".utf8_encode($produto['idUsuario'])."</td>
							<td width='10%'><label class='cabecalhos'>Estoque:</label>".utf8_encode($produto['qtdMinEstoque'])."</td>
						</tr>		
							
							
						</tr>
						<tr>
						<div height='200px'>
						</div>
						</tr>";		
			}
		}
		?>
	</table>
	</center>
</body>

<?php
	include('../menu/index.footer.tpl.php');
?>