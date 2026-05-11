<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CRUD - PHP com mysqli </title>
<body>
<h3>CRUD - PHP com mysqli - Exclusão - Consulta do Produto</h3>
<?php
	include_once('conexao.php');
	//criando o objeto mysql e conectando ao banco de dados
	$mysql = new BancodeDados();
	$mysql->conecta();
	
	// recuperando 
	$codigo = $_POST['codigo'];

	// criando a linha do  DELETE
	$sqldelete =  "delete from  tabelaimg where codigo = '$codigo' ";
	
	$resultado = $mysql->sqlstring($sqldelete,"EXCLUSÃO");
?>
<br><br>
<input type='button' onclick="window.location='exclusao.php';" value="Voltar">
</body>
</html>
