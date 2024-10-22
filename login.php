<?php include("conexao-banco.php"); ?>
<?php
session_start(); 

try {

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $pdo ->prepare("SELECT * FROM usuarios WHERE email= :email");
        $stmt ->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario && password_verify($senha, $usuario['senha'])){
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            
            header("Location: index.php");
            exit;
        } else{
            echo "<p style='color:red;'>Email ou senha incorretos!</p>";
        }
    }
} catch(PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        Email: <input type="email" name="email"><br><br>
        Senha: <input type="password" name="senha"><br><br>
        <button type="submit">Login</button>

    </form>
</body>


