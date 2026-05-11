<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="utf-8"/>
	
	 <title> Semana 01 - Exemplo 03 </title>
</head>	
 
 
<body>
<h3>Semana 01 - Exemplo 03 - Listagem Geral de Produtos </h3>
<?php
	include_once('conexao.php');
	// o include_once abre o programa conexao.html
	
	$query = mysqli_query($conexao,"select * from tabela");
	      //  A variavel $conexao é chamada do programa conexao.php  
          // select * from tabela --> seleciona todos os campos da entidade(tabela)
          // com nome tabela		  
    /* 
	se o mysqli_query( que é um comando html que executa comandos em mysql) 
    for executado com sucesso, ele guardará na variavel $query o valor true
    */	
	if (!$query) { // caso não seja true, ele dará uma mensagem de erro
		die('Query Inválida: ' . @mysqli_error($conexao));  
	}

	echo "<table border='1px'>";
	echo "<tr><th>Id</th><th>C&oacute;digo</th><th>Produto</th><th>Valor</th><tr>";
	//listando todos os arquivos da tabela
	while($dados=mysqli_fetch_array($query)) 
	{
		/* 
		esse while vai varrer cada linha de dados na tabela ( tupla ou registro)
		enquanto for true, e guarda cada linha de dados na variavel $dados,
		que se torna  um vetor ( o comando html que o converte em vetor é o 
		mysqli_fetch_array)
		*/
		
		/* na parte de baixo, ele coleta cada campo (atributo) que foi montado no
		vetor $dados */
		echo "<tr>";
		echo "<td>". $dados['id']."</td>";
		echo "<td>". $dados['codigo']."</td>";
		echo "<td>". $dados['produto']."</td>";
		echo "<td>". $dados['valor']."</td>";		
		echo "</tr>";
		}
	echo "</table>";
	// fecha a conexão com banco de dados
	mysqli_close($conexao);
?>
</body>
</html>
