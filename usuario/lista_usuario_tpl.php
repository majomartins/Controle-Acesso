<?php
include('../menu/index.head.tpl.php');
include('../menu/index.body.tpl.php');

?>
<head>
		<link href="usuarios.css" type="text/css" rel="stylesheet">
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
					echo '<a id="newusuario" href="?acao=incluir">+ Novo Usu&aacute;rio</a>';
				}else{
					echo "Novo Usuário";
				}

				?>
			</div>
		
		</div>
	<?php
	if($_SESSION['tipoPerfil'] == "C"){
		foreach($usuarios as $usuario){
			echo "	<tr>
					<td>{$usuario['idUsuario']}</td>
					<td>{$usuario['loginUsuario']}</td>
					<td>{$usuario['nomeUsuario']}</td>
					<td>{$usuario['tipoPerfil']}</td>
					<td>{$usuario['usuarioAtivo']}</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					</tr>";
		} 		
	}else{
		foreach($usuarios as $usuario){
			echo "	<div id='total'>

					<div class='info'>
					<label class='titulo'>Id Usuario</label>
						<p class='infoitem'>{$usuario['idUsuario']}</p>		
					<label class='titulo'>Id Usuario</label>
						<p class='infoitem'>{$usuario['tipoPerfil']}</p>
					<label class='titulo'>Id Usuario</label>
						<p class='infoitem'>{$usuario['usuarioAtivo']}</p>
					</div>

					<div class='nome'>
					<label class='titulo'>Id Usuario</label>
						<p class='nomeitem'>{$usuario['loginUsuario']}</p>
					<label class='titulo'>Id Usuario</label>
						<p class='nomeitem'>{$usuario['nomeUsuario']}</p>
					</div>
					<div class='funcao'>
						<p class='funcaoitem'>
						<a href='?acao=editar&id={$usuario['idUsuario']}'><img class='icone' src='editar.png'></a>
						</p>
					</div>
					<div class='funcao'>
						<p class='funcaoitem' >
							<a href='?acao=excluir&id={$usuario['idUsuario']}'><img class='icone' src='exclui.png'></a>											
						</p>
					</div>
					
					</div>";		
		}
	}
		
	
	
	?>
</body>

<?php
include('../menu/index.footer.tpl.php');
?>