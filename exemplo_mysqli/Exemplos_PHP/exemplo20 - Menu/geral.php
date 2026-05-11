<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CRUD - PHP com mysqli </title>
<body>
<h3>CRUD - PHP com mysqli - Consulta Geral</h3>
<input type='button' onclick="window.location='index.php';" value="Voltar">
<b>* Clique na imagem para ver detalhes</b><br><br>
<?php
	include_once('conexao.php');
	
	// ajustando a instrução select para ordenar por produto
	$query = mysqli_query($conexao,"select * from tabelaimg order by produto");

	if (!$query) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inválida:</b>' . @mysqli_error($conexao));  
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
		$id = base64_encode($dados['id']);
		echo "<td align='center'><a href='verproduto.php?id=$id'><img src='imagens/$imagem' width='50px' heigth='50px'></a>";
		echo "</tr>";
	}
	echo "</table>";
	
	mysqli_close($conexao);
?>
<br>
<input type='button' onclick="window.location='index.php';" value="Voltar">
</body>
</html>
