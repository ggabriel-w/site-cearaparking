<?php
$_SESSION = array();

if (!isset($_SESSION))
{
    session_start();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login Sistema</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        
        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }
        
        .login-card {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 2.5rem;
            transition: all 0.3s ease;
        }
        
        .login-card:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-header i {
            font-size: 3.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .login-header h2 {
            color: var(--dark-color);
            font-weight: 600;
            margin: 0;
        }
        
        .login-header p {
            color: #6c757d;
            margin-top: 0.5rem;
        }
        
        .form-control {
            height: 45px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            padding-left: 15px;
            margin-bottom: 1.25rem;
        }
        
        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(72, 149, 239, 0.25);
        }
        
        .btn-login {
            background-color: var(--primary-color);
            border: none;
            height: 45px;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .btn-register {
            background-color: transparent;
            color: var(--dark-color);
            border: 1px solid #dee2e6;
            height: 45px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-register:hover {
            background-color: #f8f9fa;
            border-color: #ced4da;
        }
        
        .form-floating label {
            padding-left: 15px;
            color: #6c757d;
        }
        
        .input-group-text {
            background-color: transparent;
            border-right: none;
        }
        
        .input-group .form-control {
            border-left: none;
        }
        
        .input-group:focus-within .input-group-text {
            color: var(--accent-color);
        }
        
        .input-group:focus-within .form-control {
            border-color: var(--accent-color);
        }
        
        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }
        
        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;
            border-radius: 50%;
        }
        
        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }
        
        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }
        
        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }
        
        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }
        
        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }
        
        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }
        
        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }
        
        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }
        
        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }
        
        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }
        
        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
            }
        }
    </style>
   
    <script language='JavaScript'>
    function validarLogin() {
        let vLogin = document.getElementById("login").value;        
        let vSenha = document.getElementById("senha").value;
        
        if (!vLogin || !vSenha) {
            alert("Por favor, preencha todos os campos!");
            return;
        }
        
        // Mostrar loading
        const btn = document.querySelector('.btn-login');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Validando...';
        btn.disabled = true;
        
        $.ajax({
            url: 'login_validar.php',
            type: 'POST',
            data: { pLogin: vLogin, pSenha: vSenha },
            success: function(data) {
                const cRetorno = data.replace(/(<([^>]+)>)/ig, '').trim();
                if (cRetorno === "0") {
                    // Restaurar botão
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    
                    // Efeito de shake no formulário
                    const form = document.getElementById('loginForm');
                    form.classList.add('animate__animated', 'animate__shakeX');
                    setTimeout(() => {
                        form.classList.remove('animate__animated', 'animate__shakeX');
                    }, 1000);
                    
                    alert("Login inválido! Verifique suas credenciais.");
                } else {
                    // Feedback visual antes do redirecionamento
                    btn.innerHTML = '<i class="fas fa-check-circle"></i> Sucesso!';
                    setTimeout(() => {
                        window.location.href = "usuarios/usuario_listar.php";
                    }, 1000);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Restaurar botão
                btn.innerHTML = originalText;
                btn.disabled = false;
                
                alert("Erro na requisição: " + textStatus + " - " + errorThrown);                
            }
        });
    }
    
    function cadastrarLogin() {
        const btn = document.querySelector('.btn-register');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Redirecionando...';
        
        setTimeout(() => {
            window.location.href = "usuarios/usuario_cadastrar.php";
        }, 1000);
    }
    
    // Mostrar/ocultar senha
    function togglePassword() {
        const passwordInput = document.getElementById('senha');
        const eyeIcon = document.getElementById('eye-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
    </script>
</head>
<body>
    <div class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </div>
    
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <i class="fas fa-user-shield"></i>
                <h2>Bem-vindo!</h2>
                <p>Por favor, faça login para continuar</p>
            </div>
            
            <form id="loginForm">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="login" placeholder="Digite seu login">
                    <label for="login"><i class="fas fa-user me-2"></i>Login</label>
                </div>
                
                <div class="form-floating mb-4">
                    <div class="input-group">
                        <input type="password" class="form-control" id="senha" placeholder="Digite sua senha">
                        <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                            <i id="eye-icon" class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                
                <button type="button" class="btn btn-primary btn-login w-100 mb-3" onclick="validarLogin()">
                    <i class="fas fa-sign-in-alt me-2"></i>Entrar
                </button>
                
                <div class="text-center mb-3">
                </div>
                
                <div class="divider d-flex align-items-center my-4">
                    <p class="text-center fw-bold mx-3 mb-0 text-muted">OU</p>
                </div>
                
                <button type="button" class="btn btn-register w-100" onclick="cadastrarLogin()">
                    <i class="fas fa-user-plus me-2"></i>Criar nova conta
                </button>
            </form>
        </div>
    </div>
</body>
</html>
