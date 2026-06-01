<?php

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	$host = "localhost"; // 127.0.0.1
	$user = "root"; 
	$pass = ""; 
	$banco = "banco";
	try {
        $conexao = new mysqli($host, $user, $pass, $banco);
        $conexao->set_charset("utf8");
    } catch (Exception $e) {
        throw new Exception("Aconteceu um erro com a conexão do Banco de Dados:<br>" 
        . $e->getMessage());
    }
	// $conexao = @mysqli_connect($host, $user, $pass, $banco ) 
	// or die ("Problemas com a conex�o do Banco de Dados");
?>