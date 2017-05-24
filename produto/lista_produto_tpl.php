<?php
	include "../menu/index.head.tpl.php";
	include "../menu/index.body.tpl.php";
?>

<head>
	<?php
		if($_SESSION['tipoPerfil'] == "C"){
			echo "<link href='cliente.css' rel='stylesheet' type='text/css'>";
		}else{
			echo "<link href='adm.css' rel='stylesheet' type='text/css'>";
		}
	?>
</head>
<body>
	<table>
				<?php
					if($_SESSION['tipoPerfil'] == "A"){
				
						echo '<a href="?acao=incluir">';
				
						echo"<font color='green'>
						+ Novo Produto
						</font>
						</a>";
					}
				?>
		<?php
		
		if($_SESSION['tipoPerfil'] == "C"){
			foreach($produtos as $produto){
				echo "
						<div id='table'>
							<div id='campo'>
								<img id='imagem' src='data:image/jpeg;base64,".base64_encode($produto['imagem'])."' />
							</div>
							<div id='conteudo'>
								<p id='categoria'>
									Categoria: ".$produto['idCategoria']."
								</p>
								
								<h1 id='titulo'>
									".$produto['nomeProduto']."
								</h1>
								
								<p id='texto'>
									".$produto['descProduto']."
								</p>
								<p id='estoque'>
									Estoque: ".$produto['qtdMinEstoque']."
								</p>
								<p class='valores'>
									R$ ".$produto['precProduto']."
								</p>
								<p class='valores'>
									- R$ ".$produto['descontoPromocao']."
								</p>
							</div>
						</div>";
					
			} 		
		}else{
			foreach($produtos as $produto){
								
				echo "  
						
						<tr>
							<td width='10%'><label class='cabecalhos'>ID Produto:</label>".$produto['idProduto']."</td>
							<td rowspan='5' width='30%'>".$produto['descProduto']."</td>
							<td rowspan ='5' width='10%'><img width='150px'src='data:image/jpeg;base64,".base64_encode($produto['imagem'])."' /></td>
							<td width='10%'><label class='cabecalhos'>Preço:</label>".$produto['precProduto']."</td>
							<td rowspan ='2' width='5%'><a href='?acao=editar&id={$produto['idProduto']}'>Editar</a></td>
						</tr>
						
						<tr>
							<td width='15%'>".$produto['nomeProduto']."</td>
							<td width='10%'><label class='cabecalhos'>Desconto: </label>".$produto['descontoPromocao']."</td>
							
							
						</tr>
						
						<tr>
						
						<tr>
							<td><label class='cabecalhos'>Ativo:</label>".$produto['ativoProduto']."</td>
							<td width='10%'><label class='cabecalhos'>Categoria:</label>".$produto['idCategoria']."</td>
							<td rowspan='2' width='5%'><a href='?acao=excluir&id={$produto['idProduto']}'>Excluir</a></td>
						</tr>
						
						<tr>	
							<td><label class='cabecalhos'>Usuário:</label>".$produto['idUsuario']."</td>
							<td width='10%'><label class='cabecalhos'>Estoque:</label>".$produto['qtdMinEstoque']."</td>
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