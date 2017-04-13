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
		
		echo "iniciando processamento <br>";

		if($escolha == "produto"){
		
		$query = odbc_exec($db, "SELECT * FROM
							 Produto");
							 
		while($result = odbc_fetch_array ($query)) {
		
		echo "produto: {$result['nomeProduto']} <br>";
		
		}

		}else{
	
		echo "Não deu certo <br>";

}	


	}

}



?>
<hr>
</center>
</body>
</html>
