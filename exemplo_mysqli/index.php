<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exemplo PHP PW1</title>
</head>

<h3>Semana 01 - Exemplo 04 - Listagem Geral de Produtos - Imagem</h3>
<?php
	try {
		// include_once "conexao.php";
		// require "conexao.php";
		// require_once "conexao.php";
		include "conexao.php";
		
		// ajustando a instru��o select para ordenar por produto
		//$query = mysqli_query($conexao, "select * from tabelaimg order by produto");

		$conexao = $conexao->query("select * from tabelaimg order by produto");
		
		if (!$query) {
			die('Query Inválida: ' . @mysqli_error($conexao));
		}
	
		echo "<table border='1px'>";// note que abri echo com aspas para executar
		//comando html e os atributos das tags com apostrofe 
		echo '<tr>
				<th width="30px" align="center">Id</th>
				<th width="100px">C&oacute;digo</th>
				<th width="250px">Produto</th>
				<th width="100px">Valor</th>
				<th width="100px">Produto</th>
			</tr>';
	
		while ($dados = mysqli_fetch_array($query)) {
			echo "<tr>";
			echo "<td align='center'>" . $dados['id'] . "</td>";
			echo "<td>" . $dados['codigo'] . "</td>";
			echo "<td>" . $dados['produto'] . "</td>";
			echo "<td align='right'> R$ " . $dados['valor'] . "</td>";
			// buscando a na pasta imagem
			echo "<td><img src='imagens/" . $dados['imagem'] . "'></td>";
			echo "</tr>";
		}
		echo "</table>";
	
		//mysqli_close($conexao);
		//$conexao = null;
		
	} catch (Exception $e) {
		echo "<h2>Aconteceu um erro:<br>" .
			$e->getMessage() ."</h2>";
	}
?>
</body>

</html>