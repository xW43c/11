<?php

include("conexao-banco.php");

$sql = "SELECT * FROM imoveis";  
$resultado = $conexao->query($sql);

if (!$resultado) {
    die("Erro ao buscar dados: " . $conexao->error);
}
    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<h2 style="text-align: center; margin-top: 20px; color: #0;">Seus imóveis</h2>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Imóveis</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif; 
            background-color: #f4f4f4; 
            margin: 0; 
            padding: 20px; 
        }

        table {
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }

        th, td {
            border: 1px solid #ff7f50; 
            padding: 10px; 
            text-align: left; 
        }

        th {
            background-color: #ff7f50; 
            color: white; 
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; 
        }

        tr:hover {
            background-color: #ffebcc; 
        }

        button {
            background-color: #ff7f50; 
            color: white; 
            border: none; 
            padding: 8px 12px; 
            border-radius: 5px; 
            cursor: pointer; 
            transition: background-color 0.3s; 
        }

        button:hover {
            background-color: #ff6347; 
        }

        a {
            text-decoration: none;
        }

        a button {
            margin-right: 5px; 
        }
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID </th>
            <th>Cidade </th>
            <th>Bairro </th>
            <th>Preço </th>
            <th>Venda </th>
            <th>Aluguel </th>
            <th>Descrição </th>
            <th>Quartos </th>
            <th>Imagens </th>
            <th>Ações </th>
        </tr>
        <?php

        if ($resultado->num_rows > 0) {

            while ($row = $resultado->fetch_assoc()) {

                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . (!empty($row['cidade']) ? $row['cidade'] : 'Não disponível') . "</td>"; 
                echo "<td>" . (!empty($row['bairro']) ? $row['bairro'] : 'Não disponível') . "</td>"; 
                echo "<td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>";
                echo "<td>" . ($row['venda'] == 1 ? 'Venda' : 'Não') . "</td>";
                echo "<td>" . ($row['aluguel'] == 1 ? 'Aluguel' : 'Não') . "</td>";
                echo "<td>" . (!empty($row['descricao']) ? $row['descricao'] : 'Sem descrição') . "</td>"; 
                echo "<td>" . $row['quartos'] . " quartos</td>"; 

                if (!empty($row['imagens'])) {
                    $imagens = explode(', ', $row['imagens']);
                    echo "<td>";
                    foreach ($imagens as $imagem) {
                        echo "<img src='imagens/$imagem' alt='Imagem do imóvel' style='width:100px; height:auto;'><br>";
                    }
                    echo "</td>";
                } else {
                    echo "<td>Sem imagens</td>";
                }

                echo "<td>
                        <a href='alterar.php?id=" . $row['id'] . "'><button>Alterar</button></a>
                        <a href='excluir.php?id=" . $row['id'] . "' onclick=\"return confirm('Tem certeza que deseja excluir este imóvel?');\"><button>Excluir</button></a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>Nenhum imóvel cadastrado.</td></tr>";
        }

        $conexao->close();
        ?>
    </table>
<div style="text-align: center; margin-top: 30px;">
    <a href="index.php"><button class="back-button">Voltar ao Início</button></a>
</div>
</body>
</html>
