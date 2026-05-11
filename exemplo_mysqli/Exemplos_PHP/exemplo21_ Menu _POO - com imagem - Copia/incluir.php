<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CRUD - PHP com mysqli (POO) </title>
<body>
<h3> CRUD - PHP com mysqli (POO) - Inclusão</h3>
<?php
	include_once('conexao.php');
	//criando o objeto mysql e conectando ao banco de dados
	$mysql = new BancodeDados();
	$mysql->conecta();
			
	// recuperando 
	$codigo = $_POST['codigo'];
	$produto = $_POST['produto'];	
	$descricao = $_POST['descricao'];	
	$data = $_POST['data'];	
	$valor = $_POST['valor'];	
    $imagem=$_POST['arquivo'];
	// criando a linha de INSERT
	//$sqlinsert =  "insert into tabelaimg (codigo, produto, descricao, data, valor) values ($codigo, '$produto', '$descricao', '$data', $valor)";
	$sqlinsert =  "insert into tabelaimg (codigo, produto, descricao, data, valor, imagem) values ($codigo, '$produto', '$descricao', '". date('Y-m-d', strtotime($data)) ."', $valor, '$imagem')";


	// executando instrução SQL através do método sqlstring()
	$resultado = $mysql->sqlstring($sqlinsert,"INCLUSÃO");
?>
<br><br>
<input type='button' onclick="window.location='index.php';" value="Voltar">
</body>
</html>
