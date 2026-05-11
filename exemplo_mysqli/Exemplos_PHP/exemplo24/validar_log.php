<?php
	require_once('connection/conexao.php');

	$login = $_POST['login'];
	$senha = $_POST['senha'];

	$sqlstring = " select * from tbl_usuario01 where login = '$login' and senha='$senha'";
	$info = mysqli_query($conexao, $sqlstring);
	if (!$info) { die('<b>Query Inválida: </b>' . mysqli_error($conexao)); }

    $registro = mysqli_num_rows($info);	
	
	if($registro!=1){
		echo "Usuário não localizado!!!!!";
		echo "<br><a href='index.php'>Voltar</a>";
	}else{
		$dados = mysqli_fetch_array($info);	
		echo "Olá, <b>".$dados['nome']."</b>, bem vindo ao sistema</b>";		
	}
?>
