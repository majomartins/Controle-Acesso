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
	<?php
	if (isset($msg)){
	echo $msg;
	}

	if(isset($erro)){
		echo $erro;
	}
	?>
	<div class="container">
	<table class="table">
		<thead>
		<tr>
			<th>IdCategoria</th>
			<th>NomeCategoria</th>
			<th>DescCategoria</th>
			<th colspan="2" align="center">
				<?php
					if($_SESSION['tipoPerfil'] == "A"){
				
						echo '<a href="?acao=incluir">';
				
						echo"<font color='green'>
						+ Nova Categoria
						</font>
						</a>";
					}else{
						echo "Editar Categoria";
					}
				?>
			</th>
		<tr>
		</thead>
		<?php
		
		
		if($_SESSION['tipoPerfil'] == "C"){
			foreach($categorias as $categoria){
				echo "	<tr>
						<td>{$categoria['idCategoria']}</td>
						<td>{$categoria['nomeCategoria']}</td>
						<td>{$categoria['descCategoria']}</td>";
			} 		
		}else{
			
			foreach($categorias as $categoria){
								
				echo "	<tr>
							<td>{$categoria['idCategoria']}</td>
							<td>{$categoria['nomeCategoria']}</td>
							<td>{$categoria['descCategoria']}</td>
							<td><a href='?acao=editar&id={$categoria['idCategoria']}'>Editar</a></td>
							<td><a href='?acao=excluir&id={$categoria['idCategoria']}'>Excluir</a></td>
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