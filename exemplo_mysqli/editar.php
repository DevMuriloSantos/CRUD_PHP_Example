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
        //ob_start(); // Inicia o Output Buffer
        throw new Exception("Produto não existe!");
        //header("Location: index.php");
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // criando a linha do  SELECT
        $sql = "select * from tabelaimg where id = $id";
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetch_assoc();

        $codigo = $dados['codigo'];
        $produto = $dados['produto'];
        $descricao = $dados['descricao'];
        $dt = new DateTime($dados['data'], new DateTimeZone("America/Sao_Paulo"));
        $data = $dt->format("Y-m-d");
        $valor = $dados['valor'];
        $imagem = $dados['imagem'];
    } else {
        // recuperando 
        $codigo = $_POST['codigo'];
        $produto = $_POST['produto'];
        $descricao = $_POST['descricao'];
        $data = $_POST['data'];
        $valor = $_POST['valor'];
        $sqlImagem = "select imagem from tabelaimg where id = $id";
        $resultadoImagem = $conexao->query($sqlImagem);
        $dadosImagem = $resultadoImagem->fetch_assoc();
        $arquivo = $dadosImagem['imagem'];

        $target_dir = "img/";
        $temImagemNova = isset($_FILES["imagemNova"]) && $_FILES["imagemNova"]["error"] === UPLOAD_ERR_OK;

        if ($temImagemNova) {
            $target_file = $target_dir . basename($_FILES["imagemNova"]["name"]);
            $arquivo = basename($_FILES["imagemNova"]["name"]);

            if (!move_uploaded_file($_FILES["imagemNova"]["tmp_name"], $target_file)) {
                throw new Exception("Nao foi possivel fazer o upload da imagem. Tente novamente!");
            }
        } elseif (isset($_FILES["imagemNova"]) && $_FILES["imagemNova"]["error"] !== UPLOAD_ERR_NO_FILE) {
            throw new Exception("Nao foi possivel receber a imagem. Tente novamente!");
        }

        // criando a linha de UPDATE
        $sql = "update tabelaimg set produto='" . htmlspecialchars($produto) .
            "', descricao='" . htmlspecialchars($descricao) . "', data='$data', valor=$valor, codigo=$codigo, imagem='$arquivo' where id=$id";
        // var_dump($sql);
        // exit();
        $resultado = $conexao->query($sql);

        $imagem = $arquivo;
        echo <<<ALERT
            <div class="alert alert-info container alert-dismissible fade show" role="alert">
                <h2>
                    Atualizado com sucesso!
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <a href="index.php" class="btn btn-primary">Voltar</a>
            </div>\n
        ALERT;
    }
} catch (Exception $e) {
    echo <<<ALERT
            <div class="alert alert-danger container alert-dismissible fade show" role="alert">
                <h2>Aconteceu um erro:<br>
                    {$e->getMessage()}<br>
                </h2>\n
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <a href="index.php" class="btn btn-primary">Voltar</a>
            </div>\n
        ALERT;
}

?>

<body>
    <main class="container">
        <h3>Semana 01 - Exemplo 13 - Listagem Geral de Produtos - Imagem</h3>
        <?php $id = base64_encode($id); ?>
        <form name="produto" action="editar.php?id=<?= $id; ?>" method="post" enctype="multipart/form-data">
            <b>Código:</b> <input type="number" name="codigo" required="required"
                value="<?php echo $codigo; ?>"><br><br>

            <b>Produto:</b> <input type="text" name="produto" maxlength='80' style="width:550px"
                value="<?php echo $produto; ?>"><br><br>

            <b>Descrição: </b><br><textarea name="descricao" rows='3' cols='100'
                style="resize: none;"><?php echo $descricao; ?></textarea><br><br>

            <b>Data: </b> <input type="date" name="data" value="<?php echo $data; ?>"><br><br>

            <b>Valor: R$ </b><input type="number" step="0.01" name="valor" value="<?php echo $valor; ?>"> <br>

            <input type="file" name="imagemNova" id="imagem" class="mt-3" accept="image/*"><br><br>
            <p>Pré-visualização:</p>
            <img src="<?php echo "img/$imagem"; ?>" id="preview" class="img-fluid img-thumbnail shadow mb-3 foto"
                alt="sem imagem"><br>

            <input type="submit" class="btn btn-secondary" value="Ok">&nbsp;&nbsp;
            <input type="reset" id="reset" class="btn btn-dark" value="Limpar">&nbsp;&nbsp;
            <a href="index.php" class="btn btn-primary">Cancelar</a>
        </form>
    </main>

    <script>
        const reset = document.getElementById('reset');
        const preview = document.getElementById('preview');

        reset.addEventListener('click', () => {
            preview.src = 'img/SemImagem.png'
        })
        document.getElementById('imagem').addEventListener('change', function (event) {
            //event.target -> retorna quem disparou o evento
            const file = event.target.files[0]; // Pega o primeiro arquivo selecionado

            if (!file) {
                preview.src = ""; // Limpa a imagem se nada for selecionado
                return;
            }

            // Valida se é realmente uma imagem
            if (!file.type.startsWith('image/')) {
                alert('Por favor, selecione um arquivo de imagem válido.');
                event.target.value = ""; // Limpa o campo
                preview.src = "";
                return;
            }

            // Usa FileReader para ler o arquivo e exibir
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result; // Define o conteúdo lido como src da imagem
            };
            reader.onerror = function () {
                alert('Erro ao ler o arquivo.');
            };
            reader.readAsDataURL(file); // Lê o arquivo como URL base64
        });
    </script>
</body>

</html>
