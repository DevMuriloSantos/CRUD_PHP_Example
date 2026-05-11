<html>
<head>
	<title> PHP - Exemplo de Sessão - Login </title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
	<h3> PHP - Exemplo de Sessão - Login </h3>
<?php
session_start();

if ($_SESSION['log'] != "ativo")
   {
	session_destroy();
	header("location:index.php");
	}
	echo "Olá, <b>".$_SESSION['nome']."</b>, bem vindo ao sistema</b>";		
?>
<br><br>
<b>Página autorizada</b>

</body>
</html>
