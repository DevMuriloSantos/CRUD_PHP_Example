<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CRUD - PHP com mysqli (POO) </title>
<body>
<h3> CRUD - PHP com mysqli (POO) - Alterar</h3>
<?php
	include_once('conexao.php');
	//criando o objeto mysql e conectando ao banco de dados
	$mysql = new BancodeDados();
	$mysql->conecta();
	
	// recuperando 
	$codigo = $_POST['codigo'];

	// criando a linha do  SELECT
	$sqlconsulta =  "select * from tabelaimg where codigo = $codigo";
	
	$dados = $mysql->sqlquery($sqlconsulta,'alteracao.php');
?>
<form name="produto" action="alterar.php" method="post">
	<b>Código:</b> <input type="number" name="codigo" value='<?php echo $dados['codigo']; ?>' readonly><br><br>
	<b>Produto:</b> <input type="text" name="produto" maxlength='80' style="width:550px" value='<?php echo $dados['produto']; ?>'><br><br>
	<b>Descrição: </b><br><textarea name="descricao" rows='3' cols='100' style="resize: none;" ><?php echo $dados['descricao']; ?></textarea><br><br>
	<b>Data: </b> <input type="date" name="data" value='<?php echo $dados['data']; ?>'><br><br>
	<b>Valor: R$ </b><input type="number" step="0.01" name="valor" value='<?php echo $dados['valor']; ?>'> <br><br>
	<input type="submit" value="Ok">&nbsp;&nbsp;
	<input type="reset" value="Limpar">
	<input type='button' onclick="window.location='alteracao.php';" value="Voltar">
</form>
</body>
</html>
