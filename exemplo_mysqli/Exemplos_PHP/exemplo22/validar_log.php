<?php

	$login = $_POST['login'];
	$senha = $_POST['senha'];

	$host = "localhost"; 
	$user = "root"; 
	$pass = "root"; 
	$banco = "banco";
			
	$conexao = mysqli_connect($host, $user, $pass, $banco) or die ("Problemas com a conexão do Banco de Dados");
	
	$sqlstring = " select * from tbl_usuario01 where login = '$login' and senha='$senha'";
	$info = mysqli_query($conexao, $sqlstring);
	if (!$info) { die('<b>Query Inválida: </b>' . mysqli_error($conexao)); }

    $registro = mysqli_num_rows($info);	
	
	if($registro!=1){
		echo "Usuário não localizado!!!!!";
		echo "<br><a href='index.php'>Voltar</a>";
	}else{
		echo "Bem vindo ao sistema";
	}
?>
