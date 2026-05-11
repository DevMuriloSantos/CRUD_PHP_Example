<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> Semana 01 - Exemplo 19 </title>
<body>
<h3>Semana 01 - Exemplo 19 - Alterar</h3>
<?php
	include_once('conexao.php');
	// recuperando 
	$codigo = $_POST['codigo'];

	// criando a linha do  SELECT
	$sqlconsulta =  "select * from tabelaimg where codigo = $codigo";
	
	// executando instrução SQL
	$resultado = @mysqli_query($conexao, $sqlconsulta);
	if (!$resultado) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
	} else {
		$num = @mysqli_num_rows($resultado);
		if ($num==0){
		echo "<b>Código: </b>não localizado !!!!<br><br>";
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		exit;
		}else{
			$dados=mysqli_fetch_array($resultado);
		}
	} 
	mysqli_close($conexao);
?>
<form name="produto" action="alterar.php" method="post">
	<b>Código:</b> <input type="number" name="codigo" value='<?php echo $dados['codigo']; ?>' readonly><br><br>
	<b>Produto:</b> <input type="text" name="produto" maxlength='80' style="width:550px" value='<?php echo $dados['produto']; ?>'><br><br>
	<b>Descrição: </b><br><textarea name="descricao" rows='3' cols='100' style="resize: none;" ><?php echo $dados['descricao']; ?></textarea><br><br>
	<b>Data: </b> <input type="date" name="data" value='<?php echo $dados['data']; ?>'><br><br>
	<b>Valor: R$ </b><input type="number" step="0.01" name="valor" value='<?php echo $dados['valor']; ?>'> <br><br>
	<input type="submit" value="Ok">&nbsp;&nbsp;
	<input type="reset" value="Limpar">
	<input type='button' onclick="window.location='index.php';" value="Voltar">
</form>
</body>
</html>
