<?php
    include_once '../inc/funcoes.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>        
    
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4bb543;
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
        
        .register-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 450px;
            padding: 2rem;
        }
        
        .register-card {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 2.5rem;
            transition: all 0.3s ease;
        }
        
        .register-card:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .register-header i {
            font-size: 3.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .register-header h2 {
            color: var(--dark-color);
            font-weight: 600;
            margin: 0;
        }
        
        .register-header p {
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
        
        .btn-register {
            background-color: var(--primary-color);
            border: none;
            height: 45px;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        
        .btn-register:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .btn-exit {
            background-color: transparent;
            color: var(--dark-color);
            border: 1px solid #dee2e6;
            height: 45px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-exit:hover {
            background-color: #f8f9fa;
            border-color: #ced4da;
        }
        
        .form-floating label {
            padding-left: 15px;
            color: #6c757d;
        }
        
        .password-strength {
            height: 5px;
            background: #e0e0e0;
            border-radius: 3px;
            margin-top: -10px;
            margin-bottom: 15px;
            overflow: hidden;
        }
        
        .password-strength span {
            display: block;
            height: 100%;
            width: 0;
            background: transparent;
            transition: all 0.3s ease;
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
        
        /* Animações para feedback */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }
        
        .shake {
            animation: shake 0.5s ease-in-out;
        }
        
        .success-message {
            display: none;
            background-color: var(--success-color);
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
   
    <script language='JavaScript'>
        function sair() {
            const btn = document.querySelector('.btn-exit');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saindo...';
            
            setTimeout(() => {
                window.location.href = "../login.php";
            }, 800);
        }
        
        function cadastrarUsuario() {
            const vNome = document.getElementById("nome").value;        
            const vLogin = document.getElementById("login").value;
            const vSenha = document.getElementById("senha").value;
            
            // Validação básica
            if (!vNome || !vLogin || !vSenha) {
                showError("Por favor, preencha todos os campos!");
                return;
            }
            
            if (vSenha.length < 6) {
                showError("A senha deve ter pelo menos 6 caracteres!");
                return;
            }
            
            // Mostrar loading
            const btn = document.querySelector('.btn-register');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cadastrando...';
            btn.disabled = true;
            
            $.ajax({
                url: 'usuario_incluir.php',
                type: 'POST',
                data: { pNome: vNome, pLogin: vLogin, pSenha: vSenha },
                success: function(data) {
                    const cRetorno = data.replace(/(<([^>]+)>)/ig, '').trim();
                    if (cRetorno === "0") {
                        // Restaurar botão
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                        
                        showError("Erro no cadastro! Tente novamente.");
                    } else {
                        // Feedback visual de sucesso
                        btn.innerHTML = '<i class="fas fa-check-circle"></i> Cadastrado!';
                        
                        // Mostrar mensagem de sucesso
                        const successMsg = document.getElementById('success-message');
                        successMsg.style.display = 'block';
                        
                        // Redirecionar após 2 segundos
                        setTimeout(() => {
                            window.location.href = "usuario_listar.php";
                        }, 2000);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Restaurar botão
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    
                    showError("Erro na requisição: " + textStatus);
                }
            });
        }
        
        function showError(message) {
            const errorDiv = document.getElementById('error-message');
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
            
            // Efeito de shake
            const form = document.getElementById('formCadastrar');
            form.classList.add('shake');
            setTimeout(() => {
                form.classList.remove('shake');
            }, 500);
            
            // Esconder após 5 segundos
            setTimeout(() => {
                errorDiv.style.display = 'none';
            }, 5000);
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
        
        // Validar força da senha
        function checkPasswordStrength() {
            const password = document.getElementById('senha').value;
            const strengthBar = document.getElementById('password-strength');
            
            if (password.length === 0) {
                strengthBar.style.width = '0%';
                strengthBar.style.backgroundColor = 'transparent';
                return;
            }
            
            // Calcula a força (simplificado)
            let strength = 0;
            if (password.length > 6) strength += 30;
            if (password.length > 10) strength += 30;
            if (/[A-Z]/.test(password)) strength += 20;
            if (/[0-9]/.test(password)) strength += 20;
            
            // Ajusta para não ultrapassar 100%
            strength = Math.min(strength, 100);
            
            // Atualiza a barra
            strengthBar.style.width = strength + '%';
            
            // Muda a cor baseada na força
            if (strength < 40) {
                strengthBar.style.backgroundColor = '#ff4d4d';
            } else if (strength < 70) {
                strengthBar.style.backgroundColor = '#ffcc00';
            } else {
                strengthBar.style.backgroundColor = '#4bb543';
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
    
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <i class="fas fa-user-plus"></i>
                <h2>Crie sua conta</h2>
                <p>Preencha os dados abaixo para se cadastrar</p>
            </div>
            
            <div id="error-message" class="alert alert-danger" style="display: none;"></div>
            <div id="success-message" class="success-message">
                <i class="fas fa-check-circle"></i> Cadastro realizado com sucesso! Redirecionando...
            </div>
            
            <form id="formCadastrar">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nome" placeholder="Digite seu nome completo" required>
                    <label for="nome"><i class="fas fa-user me-2"></i>Nome</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="login" placeholder="Digite seu login" required>
                    <label for="login">Login de acesso</label>
                </div>
                
                <div class="form-floating mb-2">
                    <div class="input-group">
                        <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" required 
                               oninput="checkPasswordStrength()">
                        <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                            <i id="eye-icon" class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="password-strength">
                        <span id="password-strength"></span>
                    </div>
                    <small class="text-muted">A senha deve ter pelo menos 6 caracteres</small>
                </div>
                
                <button type="button" class="btn btn-register w-100 mb-3" onclick="cadastrarUsuario()">
                    <i class="fas fa-user-plus me-2"></i>Cadastrar
                </button>
                
                <button type="button" class="btn btn-exit w-100" onclick="sair()">
                    <i class="fas fa-sign-out-alt me-2"></i>Voltar para login
                </button>
            </form>
        </div>
    </div>
</body>
</html>
