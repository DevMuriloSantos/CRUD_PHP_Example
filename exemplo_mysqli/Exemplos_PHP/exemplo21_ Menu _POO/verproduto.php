<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CRUD - PHP com mysqli (POO) </title>
<body>
<h3>CRUD - PHP com mysqli (POO) - Consulta Geral - Datelhes do Produto</h3>
<?php

	function convertedata($data){
		$data_vetor = explode('-', $data);
		$novadata = implode('/', array_reverse ($data_vetor));
		return $novadata;
	}

	include_once('conexao.php');
	//criando o objeto mysql e conectando ao banco de dados
	$mysql = new BancodeDados();
	$mysql->conecta();
	
	
	
	// recuperando a informação da URL
	// verifica se parâmetro está correto e dento da normalidade 
	if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))){
			$id = base64_decode($_GET['id']);
	} else {
		header('Location: index.php');
	}
	// realizando a pesquisa com o id recebido
	
		// criando a linha do  SELECT
	$sqlconsulta =  "select * from tabelaimg where id = $id";
	
	$dados = $mysql->sqlquery($sqlconsulta,'geral.php');
	
	echo "<table boreder='1px'><tr><td width='250px'>";
	if (empty($dados['imagem'])){
			$imagem = 'SemImagem.png';
		}else{
			$imagem = $dados['imagem'];
		}
	echo "<img src='imagens/$imagem' >";
	echo "</td><td width='400px'>";
	echo "<b>Data: </b>".convertedata($dados['data'])."<br><br>";	
	echo "<b>Id: </b>".$dados['id']."<br>";
	echo "<b>Codigo: </b>".$dados['codigo']."<br>";
	echo "<b>Produto: </b>".$dados['produto']."<br>";	
	echo "<b>Descrição: </b>".$dados['descricao']."<br>";	
	echo "<b>Valor: </b> R$ ".$dados['valor']."<br>";
	echo "</td></tr></table>";
	
?>
<br>
<input type='button' onclick="window.location='geral.php';" value="Voltar">
</body>
</html>
