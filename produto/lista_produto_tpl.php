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
		<div id='novoProduto'>
			<p id="novolink"><a id="link" href='?acao=incluir'>+Novo Produto</a></p>
		</div>
		
		<div id="campoMensagem">
			<?php
			if(isset($erro)){
				echo "<p id='erro'>".$erro."</p>";
			}
			if(isset($msg)){
				echo "<p id='mensagem'>".$msg."</p>";
			}
			?>
		</div>
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
								<p class='infoitem'><span id='marcacao'>Id:</span><br>".$produto['idProduto']."</p>
								<p class='infoitem'><span id='marcacao'>Nome:</span><br>".$produto['nomeProduto']."</p>
								<p class='infoitem'><span id='marcacao'>Ativo:</span><br>".$produto['ativoProduto']."</p>
								<p class='infoitem'><span id='marcacao'>Usuario:</span><br>".$produto['idProduto']."</p>
							</div>

							<div id='descricao'>
								<p><span id='marcacao'>Descriçao:</span><br>".$produto['descProduto']."</p>
							</div>

							<div id='campoImagemadm'>
								<img id='imagemadm' src='data:image/jpeg;base64,".base64_encode($produto['imagem'])."' />
							</div>

							<div class='info'>
								<p class='infoitem'><span id='marcacao'>Preço:</span><br>".$produto['precProduto']."</p>
								<p class='infoitem'><span id='marcacao'>Desconto:</span><br>".$produto['descontoPromocao']."</p>
								<p class='infoitem'><span id='marcacao'>Categoria:</span><br>".$produto['idCategoria']."</p>
								<p class='infoitem'><span id='marcacao'>Estoque:</span><br>".$produto['qtdMinEstoque']."</p>
							</div>

							<div id='button'>
								<div class='buttonitem'>
								<a href='?acao=editar&id={$produto['idProduto']}'><img class='icone' src='editar.png'></img></a>
								</div>
								<div class='buttonitem'>
								<a href='?acao=excluir&id={$produto['idProduto']}'><img class='icone' src='exclui.png'></a>
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