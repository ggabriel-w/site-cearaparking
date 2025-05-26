<?php
// Inicia a sessão (se necessário para autenticação)
session_start();

// Verifica se o usuário está logado (opcional)
$logged_in = isset($_SESSION['user_id']);

// Função para redirecionar
function redirect($page) {
    header("Location: $page");
    exit();
}

// Verifica ações de redirecionamento
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'credencial':
            redirect('credencial_acesso.php');
            break;
        case 'cadastro':
            redirect('/usuarios/usuario_cadastrar.php');
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title> 
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
        }
        
        header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-right: 1rem;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        nav ul li a:hover {
            background-color: #34495e;
        }
        
        main {
            padding: 2rem 0;
        }
        
        .welcome {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background-color: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-card h3 {
            margin-bottom: 1rem;
            color: #2c3e50;
        }
        
        .btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 1rem;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #2980b9;
        }
        
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">Ceará Parking</div>
            <nav>
                <ul>
                    <li><a href="menu.php">Início</a></li>
                    <li><a href="?action=cadastro">Cadastrar-se</a></li>
                    <?php if ($logged_in): ?>
                        <li><a href="logout.php">Sair</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    
    <main>
        <div class="container">
            <section class="welcome">
                <h1>Bem-vindo ao nosso site</h1>
                <p>Gerencie suas credenciais e veículos de forma fácil e rápida!</p>
            </section>
            
            <section class="features">
                <div class="feature-card">
                    <h3>Credencial de Acesso</h3>
                    <p>Solicite ou gerencie suas credenciais de acesso ao sistema.</p>
                    <a href="login.php" class="btn">Acessar</a>
                </div>
                
                <div class="feature-card">
                    <h3>Cadastrar-se</h3>
                    <p>Crie sua conta no sistema.</p>
                    <a href="?action=cadastro" class="btn">Cadastrar</a>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
