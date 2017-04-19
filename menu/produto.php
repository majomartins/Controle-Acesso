<html>
<head>
	<link href="stylesheet.css" rel="stylesheet" type="text/css">
	<meta charset="ISO-8859-1">
</head>
<body>
<center>
<h1>Produtos</h1>
<hr>

<?php  

	header("Content-type: text/html; charset=ISO-8859-1");

	if(isset($_GET['escolha'])){
		$escolha = $_GET['escolha'];


		$db_host = "10.135.0.53\sqledutsi";
		$db_name = "Kanino";
		$user = "TSI";
		$password = "SistemasInternet123";
		$dsn = "Driver={SQL Server};Server=$db_host;Port=1433;Database=$db_name;";
		if($db = odbc_connect(	$dsn, $user, $password)){
		
			echo "iniciando processamento <br>"; */

			//------------------------------------------------------------------------------------------------------------------------------------------
			
			if($escolha == "produto"){
			
				$query = odbc_exec($db, "SELECT * FROM
									 Produto");
									 
				while($result = odbc_fetch_array ($query)) {
				
					echo "produto: {$result['nomeProduto']} <br>";
				
				}
				
				

			}else{
	
				echo "Não deu mostrou a listagem <br>";

			}

			//-------------------------------------------------------------------------------------------------------------------------------------------
			
			echo "<form method ='POST' action='produto.php'>
					<p> Qual o nome do produto que gostaria de deletar?</p>
					<br>
					<input type='text' name='produtodel'>
					<br>
					<input type='submit' value='UPDATE'>
				 </form>"
					
			
			if(odbc_exec($db," DELETE FROM 
					   Produto
					   where
					   nomeProduto ='$_POST['produtodel']'")) {   
				echo "produto deletado <br>";
						   
			}else{
		
				echo "Não foi deletado"; 
		
			}
			
			//--------------------------------------------------------------------------------------------------------------------------------------------

	}		echo "<form method ='POST' action='produto.php'>
					<p> Qual o nome do produto que gostaria de alterar?</p>
					<br>
					<input type='text' name='produtoinsert'>
					<br>
					<p> Qual será o novo nome?</p>
					<br>
					<Input type='text' name='produtoalt'>
					<br>
					<input type='submit' value='UPDATE'>
				  </form>"
				  
			if(odbc_exec($db," UPDATE Produto
					   SET
					   nomeProduto = '$_POST['produtoinsert']'
					   WHERE
					   nomeProduto = '$_POST['produtoalt']'")) {
						   
				echo "produto atualizado <br>";
						   
			}else{
		
				echo "Não foi atualizado"; 
		
			}
			
			//-----------------------------------------------------------------------------------------------------------------------------------------------

			echo "<form method ='POST' action='produto.php'>
					<p> Qual o nome do produto que gostaria de inserir?</p>
					<br>
					<input type='text' name='nomeProduto'>
					
					<p> Qual o preço do produto que gostaria de inserir?</p>
					<br>
					<input type='text' name='precProduto'>
					
					<input type='submit' value='UPDATE'>
				  </form>"
				  
			if(odbc_exec($db," INSERT INTO Produto
					   (nomeProduto, precProduto,idCategoria,ativoProduto)
					   VALUES
					   ('$_POST['nomeProduto']',$_POST['precProduto'],'1','1')")) {
						   
				echo "produto adicionado <br>";
						   
			}else{
		
				echo "Não foi adicionado"; 
		
			}
}



?>
<hr>

<form method="POST" action"voltar.php">
<a href="../logout">sair</a>
</form>
</center>
</body>
</html>
