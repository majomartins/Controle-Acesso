<?php
	include "../menu/index.head.tpl.php";
	include "../menu/index.body.tpl.php";
?>
<body>
<table>
<?php
	foreach ($buscas as $busca){
		echo "<tr>
				<td>".$busca['descProduto']."</td>
				<td>".$busca['nomeProduto']."</td>
			 </tr>";
	}

?>
</table>
</body>


<?php
	include "../menu/index.footer.tpl.php";
?>