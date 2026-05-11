<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CRUD - PHP com mysqli </title>
<body>
<h3>CRUD - PHP com mysqli - Exclusão - Consulta do Produto</h3>
<?php
	include_once('conexao.php');
	// recuperando 
	$codigo = $_POST['codigo'];

	// criando a linha do  DELETE
	$sqldelete =  "delete from  tabelaimg where codigo = '$codigo' ";
	
	// executando instrução SQL
	$resultado = @mysqli_query($conexao, $sqldelete);
	if (!$resultado) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
	} else {
		echo "Registro Excluído com Sucesso";
	} 
	mysqli_close($conexao);
?>
<br><br>
<input type='button' onclick="window.location='exclusao.php';" value="Voltar">
</body>
</html>
