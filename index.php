<?php
session_start();
$nome_usuario = $_SESSION['nome'] ?? 'Usuário';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            overflow-x: hidden;
        }
        
        header {
            background-color: #ff7f50;
            padding: 30px;
            text-align: center;
            color: white;
        }
        
        nav {
            background-color: #ff7f50;
            display: flex;
            justify-content: center;
            padding: 1px 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .container {
            max-width: 1200px; 
            margin: 0 auto; 
            padding: 40px; 
            min-height: 500px; 
            box-sizing: border-box; 
        }

        .property-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .property-item {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .add-property-btn {
            background-color: #ff7f50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .add-property-btn:hover {
            background-color: #ff6347;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #ff7f50;
            color: white;
            position: relative; 
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <header>
        <h2>BSG Imóveis</h2>
    </header>

    <nav>
        <a href="index.html">Início</a>
        <a href="imoveis-salvar.php">Cadastrar Imóveis</a>
        <a href="imoveis.php">Alterar Imóveis</a>
        <a href="register.php">Registrar</a>
    </nav>

   <div class="container">
    <h1 class="welcome-message">Bem-vindo, <?php echo $nome_usuario; ?>!</h1>

    <div class="property-list">
        <div class="property-item">
            <h3>Casa à venda no centro</h3>
            <p>Preço: R$ 500.000</p>
            <p>Descrição: Excelente casa localizada no centro da cidade...</p>
            <button>Ver detalhes</button>
        </div>
        <div class="property-item">
            <h3>Apartamento para alugar</h3>
            <p>Preço: R$ 1.200/mês</p>
            <p>Descrição: Apartamento com 3 quartos e 2 banheiros...</p>
            <button>Ver detalhes</button>
        </div>
    </div>
    <a href ="logout.php">Sair</a>
    </div>
</div>
    <footer>
        <p>BSG IMÓVEIS © 2024</p>
    </footer>
</body>
</html>
