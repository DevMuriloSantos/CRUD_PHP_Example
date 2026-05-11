<?php
	$host = "localhost"; 			
	$user = "root"; 
	$pass = ""; 
	$banco = "banco1";
		
	$conexao = @mysqli_connect($host, $user, $pass, $banco ) 
	or die ("Problemas com a conexão do Banco de Dados");
?>
