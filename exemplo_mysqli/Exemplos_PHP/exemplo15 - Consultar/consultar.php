<html> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> Semana 01 - Exemplo 15 </title>
<body>
<h3>Semana 01 - Exemplo 15 - Consultar</h3>
<?php
	include_once('conexao.php');
	// recuperando 
	$codigo = $_POST['codigo'];

	// criando a linha do  SELECT
	$sqlconsulta =  "select * from tabelaimg where codigo = $codigo";
	
	// executando instrução SQL
	$resultado = @mysqli_query($conexao, $sqlconsulta);
	if (!$resultado) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
	} else {
		$dados=mysqli_fetch_array($resultado);
		echo "<b>Código: </b>".$dados['codigo']."<br><br>";
		echo "<b>Produto: </b>".$dados['produto']."<br><br>";
		echo "<b>Descrição: </b>".$dados['descricao']."<br><br>";	
		echo "<b>Data: </b>".substr($dados['data'], 8, 2).'/'.substr($dados['data'], 5, 2).'/'.substr($dados['data'], 0, 4)."<br><br>";		echo "<b>Valor: </b>R$ ".$dados['valor']."<br><br>";				
		echo "Registro Consultado com Sucesso";
	} 
	mysqli_close($conexao);
?>
<br><br>
<input type='button' onclick="window.location='index.php';" value="Voltar">
</body>
</html>
