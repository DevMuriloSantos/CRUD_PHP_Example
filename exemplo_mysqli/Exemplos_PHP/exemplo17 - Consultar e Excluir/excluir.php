<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> Semana 01 - Exemplo 17 </title>
<body>
<h3>Semana 01 - Exemplo 17 - Consultar e Excluir</h3>
<?php
	include_once('conexao.php');
	// recuperando 
	$codigo = $_POST['codigo'];

	// criando a linha do  DELETE
	$sqldelete =  "delete from  tabelaimg where codigo = '$codigo' ";
	
	// executando instrução SQL
	$resultado = @mysqli_query($conexao, $sqldelete);
	if (!$resultado) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
	} else {
		echo "Registro Excluído com Sucesso";
	} 
	mysqli_close($conexao);
?>
<br><br>
<input type='button' onclick="window.location='index.php';" value="Voltar">
</body>
</html>
