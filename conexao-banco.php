<?php
$host = 'localhost';
$banco = 'bdimoveis';
$usuario = 'root';
$senha = '';
$pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$conexao = new mysqli($host, $usuario, $senha, $banco);


if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

?>
