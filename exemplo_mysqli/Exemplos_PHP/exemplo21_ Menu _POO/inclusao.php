<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CRUD - PHP com mysqli (POO) </title>
<body>
<h3> CRUD - PHP com mysqli (POO) - Inclusão</h3>
<form name="produto" action="incluir.php" method="post">
<b>Código:</b> <input type="number" name="codigo"><br><br>
<b>Produto:</b> <input type="text" name="produto" maxlength='80' style="width:550px"><br><br>
<b>Descrição: </b><br><textarea name="descricao" rows='3' cols='100' style="resize: none;" ></textarea><br><br>
<b>Data: </b> <input type="date" name="data"><br><br>
<b>Valor: R$ </b><input type="number" step="0.01" name="valor"> <br><br>
<input type="submit" value="Ok">
<input type="reset" value="Limpar">
<input type='button' onclick="window.location='index.php';" value="Voltar">
</form>
</body>
</html>
