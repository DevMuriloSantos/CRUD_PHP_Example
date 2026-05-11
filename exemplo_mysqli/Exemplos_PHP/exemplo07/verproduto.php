<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> Semana 01 - Exemplo 07 </title>
<body>
<h3>Semana 01 - Exemplo 07 - Detalhes do Produto</h3>
<?php
	include_once('conexao.php');
	// recuperando a informação da URL
	$id = $_GET['id'];
	
	// realizando a pesquisa com o id recebido
	$query = mysqli_query($conexao,"select * from tabelaimg where id = $id");

	if (!$query) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
	}

	$dados=mysqli_fetch_array($query);
	
	echo "<table boreder='1px'><tr><td width='250px'>";
	if (empty($dados['imagem'])){
			$imagem = 'SemImagem.png';
		}else{
			$imagem = $dados['imagem'];
		}
	echo "<img src='imagens/$imagem' >";
	echo "</td><td width='400px'>";
	echo "<b>Id: </b>".$dados['id']."<br>";
	echo "<b>Codigo: </b>".$dados['codigo']."<br>";
	echo "<b>Produto: </b>".$dados['produto']."<br>";	
	echo "<b>Descrição: </b>".$dados['descricao']."<br>";	
	echo "<b>Valor: </b> R$ ".$dados['valor']."<br>";
	echo "</td></tr></table>";
	
	mysqli_close($conexao);
?>
<br>
<a href="javascript:window.history.go(-1)">Voltar</a>
</body>
</html>
