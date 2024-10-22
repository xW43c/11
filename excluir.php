<?php

include("conexao-banco.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "DELETE FROM imoveis WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        echo "Imóvel excluído com sucesso!";
    } else {
        echo "Erro ao excluir o imóvel: " . $conexao->error;
    }

    header("Location: imoveis.php");
    exit;
} else {
    echo "ID do imóvel não informado!";
}
?>