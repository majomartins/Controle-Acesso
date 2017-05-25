<?php
	include "../menu/index.head.tpl.php";
	include "../menu/index.body.tpl.php";
?>
<body>
	<?php
		if (isset($msg)){
			echo "$msg";
		}else{ ?>
	

	<table>
	<h1>Produtos</h1>


	<?php

		foreach ($buscasp as $busca){
			echo "<tr>
					<td>".$busca['nomeProduto']."</td>
					<td>".$busca['descProduto']."</td>
				 </tr>";
		}
	?>
	</table>
	<table>
	<h1>Categorias</h1>

	<?php	
		foreach ($buscasc as $busca){
			echo "<tr>
					<td>".$busca['nomeCategoria']."</td>
				 </tr>";
		}
	?>
	</table>

	<h1>Usuario</h1>
	<table>
	<?php
		
		foreach ($buscasu as $busca){
			echo "<tr>
					<td>".$busca['nomeUsuario']."</td>
				 </tr>";
		}
	?>
	</table>

	</body>
	
		<?php } ?>
<?php
	include "../menu/index.footer.tpl.php";
?>