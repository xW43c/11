<?php
// Conexão com o banco de dados
$host = 'localhost';
$banco = 'bdimoveis';
$usuario = 'root';
$senha = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Falha na conexão: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coletando dados do formulário
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $preco = $_POST['preco'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $quartos = $_POST['quartos'];
    
    $imagens = implode(', ', $_FILES['arquivo']['name']);
    
    if (!empty($_FILES['arquivo']['name'][0])) {
        foreach ($_FILES['arquivo']['tmp_name'] as $key => $tmp_name) {
            $nomeArquivo = $_FILES['arquivo']['name'][$key];
            $caminhoDestino = "imagens/" . $nomeArquivo;
            move_uploaded_file($tmp_name, $caminhoDestino);
        }
    }

    $sql = "INSERT INTO imoveis (cidade, bairro, preco, venda, aluguel, descricao, quartos, imagens)
            VALUES (:cidade, :bairro, :preco, :venda, :aluguel, :descricao, :quartos, :imagens)";
    
    $venda = ($tipo == 0) ? 1 : 0;
    $aluguel = ($tipo == 1) ? 1 : 0;

    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':venda', $venda);
    $stmt->bindParam(':aluguel', $aluguel);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':quartos', $quartos);
    $stmt->bindParam(':imagens', $imagens);
    
    try {
        $stmt->execute();
        echo "<div class='success-message'>Imóvel cadastrado com sucesso!</div>";
    } catch (Exception $e) {
        echo "<div class='error-message'>Erro: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Imóveis</title>
    <link rel="stylesheet" href="./css/imoveis.css">
</head>
<body>
<div class="container">
    <h1>Cadastro de Imóveis</h1>
    <form method="post" enctype="multipart/form-data">
        Cidade: <input type="text" name="cidade" required><br><br>
        Bairro: <input type="text" name="bairro" required><br><br>
        Preço: <input type="text" name="preco" required><br><br>

        Quartos:
        <select name="quartos">
            <option value="2">2 quartos</option>
            <option value="3">3 quartos</option>
            <option value="4">4 quartos</option>
        </select><br><br>

        Qual o tipo:
        <select name="tipo">
            <option value="0">Venda</option>
            <option value="1">Aluguel</option>
        </select><br><br>

        Descrição do imóvel:<br>
        <textarea name="descricao" rows="5" cols="30" required></textarea><br><br>

        Imagens do imóvel:
        <input type="file" name="arquivo[]" multiple="multiple"><br><br>

<div class="button-container">
            <input type="submit" name="salvar" value="Salvar" class="action-button">
            <button type="button" onclick="window.location.href='index.php';" class="action-button">Voltar</button>
        </div>
    </form>
</body>
</html>
