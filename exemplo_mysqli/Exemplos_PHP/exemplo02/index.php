<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> Semana 01 - Exemplo 02 </title>
<body>
<h3>Semana 01 - Exemplo 02 - Conexão (Include ou Require)</h3>
<?php
	include_once('conexao.php');
	
	$query = mysqli_query($conexao,"select * from tabela");

	if (!$query) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
	}

	$dados=mysqli_fetch_array($query);
	
	// recupera as informações do array $dados, usando o nome do campo como referência
	echo "<b>Id: </b>".$dados['id']."<br>";
	echo "<b>Codigo: </b>".$dados['codigo']."<br>";
	echo "<b>Produto: </b>".$dados['produto']."<br>";	
	echo "<b>Descrição: </b>".$dados['descricao']."<br>";	
	echo "<b>Valor: </b> R$ ".$dados['valor']."<br>";	
	
	mysqli_close($conexao);
?>
</body>
</html>
