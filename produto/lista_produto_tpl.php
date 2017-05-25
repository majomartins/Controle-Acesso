<?php
	include "../menu/index.head.tpl.php";
	include "../menu/index.body.tpl.php";
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
								
				echo "  <div id='divcontainer'>

							<div class='info'>
								<p class='infoitem'>Id:<br>".$produto['idProduto']."</p>
								<p class='infoitem'>Nome:<br>".$produto['nomeProduto']."</p>
								<p class='infoitem'>Ativo:<br>".$produto['ativoProduto']."</p>
								<p class='infoitem'>Usuario:<br>".$produto['idProduto']."</p>
							</div>

							<div id='descricao'>
								<p>Descriçao:<br>".$produto['descProduto']."</p>
							</div>

							<div id='campoImagemadm'>
								<img id='imagemadm' src='data:image/jpeg;base64,".base64_encode($produto['imagem'])."' />
							</div>

							<div class='info'>
								<p class='infoitem'>Preço:<br>".$produto['precProduto']."</p>
								<p class='infoitem'>Desconto:<br>".$produto['descontoPromocao']."</p>
								<p class='infoitem'>Categoria:<br>".$produto['idCategoria']."</p>
								<p class='infoitem'>Estoque:<br>".$produto['qtdMinEstoque']."</p>
							</div>

							<div id='button'>
								<div class='buttonitem'>
								<img class='icone' src='editar.png' href='?acao=editar&id={$produto['idProduto']}'>
								</div>
								<div class='buttonitem'>
								<img class='icone' src='exclui.png' href='?acao=excluir&id={$produto['idProduto']}'>
								</div>
							</div>
						</div> 
						
						";
			}
		}
		?>
</body>

<?php
	include('../menu/index.footer.tpl.php');
?>