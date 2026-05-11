<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> Semana 01 - Exemplo 05 </title>
<body>
<h3>Semana 01 - Exemplo 05 - Listagem Geral de Produtos - Imagem</h3>
<?php
	include_once('conexao.php');
	
	// ajustando a instrução select para ordenar por produto
	$query = mysqli_query($conexao,"select * from tabelaimg order by produto");

	if (!$query) {
		die('Query Inválida: ' . @mysqli_error($conexao));  
	}

	echo "<table border='1px'>";
	echo "<tr><th width='30px' align='center'>Id</th><th width='100px'>Código</th><th width='250px'>Produto</th><th width='100px'>Valor</th><th width='100px'>Produto</th><tr>";

	while($dados=mysqli_fetch_array($query)) 
	{
		echo "<tr>";
		echo "<td align='center'>". $dados['id']."</td>";
		echo "<td>". $dados['codigo']."</td>";
		echo "<td>". $dados['produto']."</td>";
		echo "<td align='right'> R$ ". $dados['valor']."</td>";		
		// buscando a na pasta imagem
		if (empty($dados['imagem'])){
			$imagem = 'SemImagem.png';
		}else{
			$imagem = $dados['imagem'];
		}
		echo "<td align='center'><img src='imagens/$imagem' width='50px' heigth='50px'></td>";
		echo "</tr>";
		}
	echo "</table>";
	
	mysqli_close($conexao);
?>
</body>
</html>
