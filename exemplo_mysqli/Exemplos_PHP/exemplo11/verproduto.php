<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> Semana 01 - Exemplo 11 </title>
<body>
<h3>Semana 01 - Exemplo 11 - Detalhes do Produto</h3>
<?php

	function convertedata($data){
		$novadata = substr($data, 8, 2).'/'.substr($data, 5, 2).'/'.substr($data, 0, 4);
		return $novadata;
	}

	include_once('conexao.php');
	// recuperando a informação da URL
	// verifica se parâmetro está correto e dento da normalidade 
	if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))){
			$id = base64_decode($_GET['id']);
	} else {
		header('Location: index.php');
	}
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
	echo "<b>Data: </b>".convertedata($dados['data'])."<br><br>";	
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
