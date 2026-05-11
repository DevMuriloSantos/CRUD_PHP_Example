<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> Semana 01 - Exemplo 16 </title>
<body>
<h3>Semana 01 - Exemplo 16 - Consultar</h3>
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
		$dados=mysqli_fetch_array($resultado);
	} 
	mysqli_close($conexao);
?>
<b>Código:</b> <input type="number"  value="<?php echo $dados['codigo']; ?>" readonly ><br><br>
<b>Produto:</b> <input type="text"  maxlength='80' style="width:550px" value="<?php echo $dados['produto']; ?>" readonly ><br><br>
<b>Descrição: </b><br><textarea  rows='3' cols='100' style="resize: none;" readonly ><?php echo $dados['descricao']; ?></textarea><br><br>
<b>Data: </b> <input type="date" value="<?php echo $dados['data']; ?>" readonly ><br><br>
<b>Valor: R$ </b><input type="number" step="0.01" name="valor" value="<?php echo $dados['valor']; ?>" readonly > <br><br>
<input type='button' onclick="window.location='index.php';" value="Voltar">
</body>
</html>