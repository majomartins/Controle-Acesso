<?php
	ini_set ('odbc.defaultlrl', 9000000);
	include "../menu/index.head.tpl.php";
	include "../menu/index.body.tpl.php";

?>
<head>
	<link href='adm.css' rel='stylesheet' type='text/css'>
</head>
<body>
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

		if(isset($buscasp)){
		foreach ($buscasp as $busca){	
			echo "<div id='divcontainer'>
							<div class='info'>
								<p class='infoitem'><span id='marcacao'>Id:</span><br>".$busca['idProduto']."</p>
								<p class='infoitem'><span id='marcacao'>Nome:</span><br>".$busca['nomeProduto']."</p>
								<p class='infoitem'><span id='marcacao'>Ativo:</span><br>".$busca['ativoProduto']."</p>
								<p class='infoitem'><span id='marcacao'>Usuario:</span><br>".$busca['idUsuario']."</p>
							</div>

							<div id='descricao'>
								<p><span id='marcacao'>Descriçao:</span><br>".$busca['descProduto']."</p>
							</div>

							<div id='campoImagemadm'>
								<img id='imagemadm' src='data:image/jpeg;base64,".base64_encode($busca['imagem'])."' />
							</div>

							<div class='info'>
								<p class='infoitem'><span id='marcacao'>Preço:</span><br>".number_format($busca['precProduto'],2,',','.')."</p>
								<p class='infoitem'><span id='marcacao'>Desconto:</span><br>";
									if($busca['descontoPromocao'] > 1){
										echo $busca['descontoPromocao'];
									}else{
										echo "Sem desconto";
									}
								
							echo"</p>
								<p class='infoitem'><span id='marcacao'>Categoria:</span><br>".$busca['idCategoria']."</p>
								<p class='infoitem'><span id='marcacao'>Estoque:</span><br>".$busca['qtdMinEstoque']."</p>
							</div>
						</div>";
		}
	}
	?>
</body>

<?php
	include "../menu/index.footer.tpl.php";
?>