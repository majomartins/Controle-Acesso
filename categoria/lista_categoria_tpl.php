<?php

include "../menu/index.head.tpl.php";
include "../menu/index.body.tpl.php";

?>
<head>
	<link href="adm.css" rel="stylesheet" type="text/css">
</head>
<body>
		<div id="subcampo">

			<div id="campoleft">
			<?php
			if(isset($erro)){
				echo "<p id='erro'>".$erro."</p'>";
			}

			if(isset($msg)){
				echo "<p id='mensagem'>".$msg."</p>";
			}
			?>
		
			</div>
			
			<div id="camporight">
			<?php
				
			if($_SESSION['tipoPerfil'] == "A"){
				echo '<a id="newcategoria" href="?acao=incluir">+ Nova Categoria</a>';
			}else{
				echo "Novo Usuário";
			}

			?>
			</div>
		
		</div>
		<?php
		
			foreach($categorias as $categoria){
								
				echo "	<div id='total'>
							<div id='campoid'>
								<p id='itemidt'>ID Categoria</p>
								<p id='itemid'>{$categoria['idCategoria']}</p>
							</div>

							<div id='campoinfo'>
								<p class='itens'>Nome Categoria</p>
								<p class='itensinfo'>{$categoria['nomeCategoria']}</p>
								<p class='itens'>Descrição Categoria</p>
								<p class='itensinfo'>.".$categoria['descCategoria']."</p>
							</div>

							<div id='iconeeditar'>
								<a href='?acao=editar&id={$categoria['idCategoria']}'><img class='imagem' src='editar.png'></img></a></td>
							</div>
								
							<div id='iconeexcluir'>
								<a href='?acao=excluir&id={$categoria['idCategoria']}'><img class='imagem' src='exclui.png'></img></a></td>
							</div>
							</div>
						</div>";		
			}
		?>
</body>

<?php
	include('../menu/index.footer.tpl.php');
?>