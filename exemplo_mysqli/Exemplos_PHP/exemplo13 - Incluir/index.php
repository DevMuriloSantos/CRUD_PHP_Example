<html> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> Semana 01 - Exemplo 13 </title>
<body>
<h3>Semana 01 - Exemplo 13 - Inclusão</h3>
<form name="produto" action="incluir.php" method="post">
<b>Código:</b> <input type="number" name="codigo" required="required"><br><br>  
<b>Produto:</b> <input type="text" name="produto" maxlength='80' style="width:550px"><br><br>
<b>Descrição: </b><br><textarea name="descricao" rows='3' cols='100' style="resize: none;" ></textarea><br><br>
<b>Data: </b> <input type="date" name="data"><br><br>
<b>Valor: R$ </b><input type="number" step="0.01" name="valor"> <br><br>
<input type="submit" value="Ok">&nbsp;&nbsp;
<input type="reset" value="Limpar">
</form>
</body>
</html>
