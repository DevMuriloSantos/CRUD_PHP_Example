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
        .centraliza {
            text-align: center;
        }

        .foto {
            width: 150px;
        }
    </style>
</head>
<?php

try {
    include "conexao.php";

    // recuperando a informação da URL
    // verifica se parâmetro está correto e dento da normalidade 
    if (isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))) {
        $id = base64_decode($_GET['id']);
    } else {
        // ob_start(); // Incia o Output Buffer
        // header("Location: index.php");
        // echo "Error";
        throw new Exception("Produto não existe");
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        // criando a linha do  SELECT
        $sql = "select * from tabelaimg where id = $id";
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetch_assoc();

        $codigo = $dados['codigo'];
        $produto = $dados['produto'];
        $descricao = $dados['descricao'];
        $dt = new DateTime($dados['data'], new DateTimeZone('America/Sao_Paulo'));
        $data = $dt->format('Y-m-d');
        $valor = $dados['valor'];
    } else {
        // recuperando 
        // echo $id;
        $codigo = $_POST['codigo'];
        $produto = $_POST['produto'];
        $descricao = $_POST['descricao'];
        $data = $_POST['data'];
        $valor = $_POST['valor'];

        // criando a linha de UPDATE
        // sempre colocar where no update
        $sql = "update tabelaimg set produto='". htmlspecialchars($produto) .
        "', descricao='". htmlspecialchars($descricao) ."', data='$data', valor=$valor, codigo=$codigo where id=$id";
        $resultado = $conexao->query($sql);

        echo <<<ALERT
            <div class="alert alert-info container alert-dismissible fade show" role="alert">\n
                <h2>Aconteceu um erro:<br>\n
                    Atualizado com sucesso!\n
                </h2>\n
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\n
                <a href="index.php" class="btn btn-primary">Voltar</a>\n
            </div>\n
        ALERT;
    }

} catch (Exception $e) {
    echo <<<ALERT
            <div class="alert alert-danger container alert-dismissible fade show" role="alert">\n
                <h2>Aconteceu um erro:<br>\n
                    {$e->getMessage()}\n
                </h2>\n
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\n
                <a href="index.php" class="btn btn-primary">Voltar</a>\n
            </div>\n
        ALERT;
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     try {

//     } catch (Exception $e) {
//         echo <<<ALERT
//             <div class="alert alert-danger container alert-dismissible fade show" role="alert">\n
//                 <h2>Aconteceu um erro:<br>\n
//                     {$e->getMessage()}\n
//                 </h2>\n
//                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\n
//                 <a href="index.php" class="btn btn-primary">Voltar</a>\n
//             </div>\n
//         ALERT;
//     }
// }
?>

<body>
    <main class="container">
        <h3>Semana 01 - Exemplo 13 - Listagem Geral de Produtos - Imagem</h3>
        <!-- <?php $id = base64_encode($_GET['id']); ?> -->
        <?php $id = $_GET['id']; ?>
        <!-- <?php echo $id; ?> -->
        <form name="produto" action="editar.php?id=<?php echo $id; ?>" method="post">
            <input type="hidden" name="id">
            <b>Código:</b> <input type="number" name="codigo" required="required"
                value="<?php echo $codigo; ?>"><br><br>
            <b>Produto:</b> <input type="text" name="produto" maxlength='80' style="width:550px"
                value="<?php echo $produto; ?>"><br><br>
            <b>Descrição: </b><br><textarea name="descricao" rows='3' cols='100'
                style="resize: none;"><?php echo $descricao ?></textarea><br><br>
            <b>Data: </b> <input type="date" name="data" value="<?php echo $data; ?>"><br><br>
            <b>Valor: R$ </b><input type="number" step="0.01" name="valor" value="<?php echo $valor; ?>"> <br><br>
            <input type="submit" class="btn btn-secondary" value="Ok">&nbsp;&nbsp;
            <input type="reset" class="btn btn-dark" value="Limpar">
        </form>
    </main>
</body>

</html>