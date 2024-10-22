<?php
include("conexao-banco.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM imoveis WHERE id = $id";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        $imovel = $resultado->fetch_assoc();
    } else {
        echo "Imóvel não encontrado!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $preco = $_POST['preco'];
    $venda = $_POST['venda'];
    $aluguel = $_POST['aluguel'];
    $descricao = $_POST['descricao'];
    $quartos = $_POST['quartos'];

    $sql = "UPDATE imoveis SET cidade='$cidade', bairro='$bairro', preco='$preco', venda='$venda', aluguel='$aluguel', descricao='$descricao', quartos='$quartos' WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        echo "Imóvel atualizado com sucesso!";
        header("Location: imoveis.php");
        exit;
    } else {
        echo "Erro ao atualizar o imóvel: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Imóvel</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        
        h1 {
            color: #ff7f50; /* Cor laranja para o título */
            text-align: center;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px; 
            margin: 0 auto; 
        }

        input[type="text"],
        input[type="number"],
        input[type="radio"] {
            width: calc(100% - 22px); 
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; 
        }

        .radio-group {
            display: flex; 
            justify-content: space-between; 
            margin: 10px 0; 
        }

        input[type="submit"] {
            background-color: #ff7f50; 
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%; 
        }

        input[type="submit"]:hover {
            background-color: #ff6347; 
        }
    </style>
</head>
<body>

    <h1>Alterar Imóvel</h1>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $imovel['id']; ?>">
        Cidade: <input type="text" name="cidade" value="<?php echo $imovel['cidade']; ?>" required>
        Bairro: <input type="text" name="bairro" value="<?php echo $imovel['bairro']; ?>" required>
        Preço: <input type="text" name="preco" value="<?php echo $imovel['preco']; ?>" required>
        
        <div class="radio-group">
            Venda: 
            <label><input type="radio" name="venda" value="1" <?php echo ($imovel['venda'] == 1) ? 'checked' : ''; ?>> Sim</label>
            <label><input type="radio" name="venda" value="0" <?php echo ($imovel['venda'] == 0) ? 'checked' : ''; ?>> Não</label>
        </div>

        <div class="radio-group">
            Aluguel: 
            <label><input type="radio" name="aluguel" value="1" <?php echo ($imovel['aluguel'] == 1) ? 'checked' : ''; ?>> Sim</label>
            <label><input type="radio" name="aluguel" value="0" <?php echo ($imovel['aluguel'] == 0) ? 'checked' : ''; ?>> Não</label>
        </div>
        
        Descrição: <input type="text" name="descricao" value="<?php echo $imovel['descricao']; ?>" required>
        Quartos: <input type="number" name="quartos" value="<?php echo $imovel['quartos']; ?>" required>
        <input type="submit" value="Salvar Alterações">
    </form>

</body>
</html>
