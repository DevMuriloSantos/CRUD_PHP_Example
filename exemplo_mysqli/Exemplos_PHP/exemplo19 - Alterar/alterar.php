<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> Semana 01 - Exemplo 19 </title>
<body>
<h3>Semana 01 - Exemplo 19 - Alterar</h3>
<?php
	include_once('conexao.php');
	// recuperando 
	$codigo = $_POST['codigo'];
	$produto = $_POST['produto'];	
	$descricao = $_POST['descricao'];	
	$data = $_POST['data'];	
	$valor = $_POST['valor'];	

	// criando a linha do  UPDATE
	$sqlupdate =  "update tabelaimg set produto='$produto', descricao='$descricao',data='$data',valor=$valor where codigo=$codigo";

	// executando instrução SQL
	$resultado = @mysqli_query($conexao, $sqlupdate);
	if (!$resultado) {
		die('<b>Query Inválida:<b>' . @mysqli_error($conexao));  
	} else {
		echo "Registro Alterado com Sucesso";
	} 
	mysqli_close($conexao);
?>
<br><br>
	<input type='button' onclick="window.location='index.php';" value="Voltar">
</body>
</html>
