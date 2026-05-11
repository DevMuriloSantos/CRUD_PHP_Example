<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CRUD - PHP com mysqli </title>
<body>
<h3>CRUD - PHP com mysqli - Exclusão - Consulta do Produto</h3>
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
		echo '<input type="button" onclick="window.location='."'exclusao.php'".';" value="Voltar"><br><br>';
		exit;		
		}else{
			$dados=mysqli_fetch_array($resultado);
		}
	} 
	mysqli_close($conexao);
?>
<b>Código:</b> <input type="number"  value="<?php echo $dados['codigo']; ?>" readonly ><br><br>
<b>Produto:</b> <input type="text"  maxlength='80' style="width:550px" value="<?php echo $dados['produto']; ?>" readonly ><br><br>
<b>Descrição: </b><br><textarea  rows='3' cols='100' style="resize: none;" readonly ><?php echo $dados['descricao']; ?></textarea><br><br>
<b>Data: </b> <input type="date" value="<?php echo $dados['data']; ?>" readonly ><br><br>
<b>Valor: R$ </b><input type="number" step="0.01" name="valor" value="<?php echo $dados['valor']; ?>" readonly > <br><br>
<form name="produto" action="excluir.php" method="post">
	<input type='hidden' name='codigo' value="<?php echo $dados['codigo']; ?>">
	<input type='submit' value='Apagar'>
	<input type='button' onclick="window.location='exclusao.php';" value="Voltar">
</form>
</body>
</html>
