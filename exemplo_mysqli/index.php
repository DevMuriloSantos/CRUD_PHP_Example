<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exemplo PHP PW1</title>
	<link rel="icon" type="image/icon" href="img/icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<style>
			.centraliza{
				text-align: center;
			}
			.foto {
				width: 150 px;
			}
	</style>
</head>

<body>
	<main class="container">
		<h3>Semana 01 - Exemplo 04 - Listagem Geral de Produtos - Imagem</h3>
		<?php
		try {
			// include_once "conexao.php";
			// require "conexao.php";
			// require_once "conexao.php";
			include "conexao.php";

			// ajustando a instrução select para ordenar por produto
			//$query = mysqli_query($conexao, "select * from tabelaimg order by produto");
			$sql = "select * from tabelaimg order by produto";
			$query = $conexao->query($sql);
			// if (!$query) {
			// 	die('Query Inválida: ' . @mysqli_error($conexao));
			// }
		
			echo "<table class=\"table table-secondary table-hover\">";// note que abri echo com aspas para executar
			//comando html e os atributos das tags com apostrofe 
			echo '<tr>
				<th width="30px">Id</th>
				<th width="100px">C&oacute;digo</th>
				<th width="250px">Produto</th>
				<th width="100px">Valor</th>
				<th width="100px">Produto</th>
			</tr>';

			while ($dados = mysqli_fetch_array($query)) {
				echo "<tr>";
				echo "<td class=\"centraliza\">" . $dados['id'] . "</td>";
				echo "<td>" . $dados['codigo'] . "</td>";
				echo "<td>" . $dados['produto'] . "</td>";
				echo "<td align='right'> R$ " . number_format($dados['valor'], 2, "," , ".") . "</td>";
				// buscando a na pasta imagem
				echo "<td><img src='img/" . $dados['imagem'] . "'></td>";
				echo "</tr>";
				if (empty($dados['imagem'])){
					$imagem = 'SemImagem.png';
				}else{
					$imagem = $dados['imagem'];
				}

				echo "<img src={$imagem} class=\"foto shadow\" />";
			}
			echo "</table>";

			//mysqli_close($conexao);
			//$conexao = null;
		
		} catch (Exception $e) {			
			echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">\n
					<h2>Aconteceu um erro:<br>\n
						{$e->getMessage()}\n
					</h2>\n
					<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>\n
				</div>\n";
		}
		?>
	</main>
	<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>