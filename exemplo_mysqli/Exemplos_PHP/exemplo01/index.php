<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title> Semana 01 - Exemplo 01 </title>
</head>
<body>
<h3>Semana 01 - Exemplo 01 - Conexão</h3>
<?php
	// dados para conexão com base de dados MySql
	// ajuste os dados de conexão de acordo com o seu ambiente de trabalho
	$host = "localhost"; 			
	$user = "root"; 
	$pass = "root"; 
	$banco = "banco1";
		
	// criando a linha de conexão
	
	$conexao = @mysqli_connect($host, $user, $pass, $banco ) 
	or die ("Problemas com a conexão do Banco de Dados");
	$conexao -> set_charset("utf8");
	// executa a query com base na conexão
	$query = mysqli_query($conexao,"select * from tabela");
	
	// verifica se a query está Ok
	if (!$query) {
		die('Query Inválida: ' . @mysqli_error($conexao));  // mostra o erro 
	}
	
	// retorna uma matriz que corresponde a linha - ponteiro
	$dados=mysqli_fetch_array($query);
	
	// recupera as informações do array $dados, usando o nome do campo como referência
	echo "<b>Id: </b>".$dados['id']."<br>";
	echo "<b>Código: </b>".$dados['codigo']."<br>";
	echo "<b>Produto: </b>".$dados['produto']."<br>";	
	echo "<b>Descrição: </b>".$dados['descricao']."<br>";	
	echo "<b>Valor: </b> R$ ".$dados['valor']."<br>";	
	
	// finaliza a conexão
	mysqli_close($conexao);
?>
</body>
</html>
