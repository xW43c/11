<?php

if(!isset($_SESSION['usuario_id'])){
    header('Location: login.php');
    exit;
}

/*$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$usuarioCorreto = "admin";
$senhaCorreta = "1234";

if ($usuario === $usuarioCorreto && $senha === $senhaCorreta) {
    $_SESSION['nome'] = "Fulano de Tal";
    
    header("Location: index.php");
    exit();
} 
else {
    echo "Error";
    header("Location: login.php?erro=1");
    exit();
}*/
?>
