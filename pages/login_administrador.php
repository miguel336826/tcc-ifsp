<?php
include "../includes/functions.php";

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>
    <link rel="stylesheet" href="../assets/css/css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-5" id="navegacao">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#"><img src="../icons/favicon.ico" class="me-3"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"><a href="../pages/login_usuario.php" class="btn btn-lg me-3">Entrar</a></li>
                    <li class="nav-item"><a href="../pages/cadastro_usuario.php" class="btn btn-lg me-3">Cadastre-se no Matemágico gratuitamente</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="div-alerta-sucesso ms-5 mt-5 d-none" id="div-alerta-sucesso">
        <span class="alerta-sucesso" id="alerta-sucesso"></span>
    </div>
    <style>
        .div-alerta-sucesso {
            position: fixed;
            top: 10%;
            left: 3%;
            background-color: #16cc0c;
            color: #fff;
            border-radius: 8px;
            padding: 15px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .alerta-sucesso {
            flex: 1;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .div-alerta-sucesso {
            animation: fadeIn 0.5s ease-out;
        }
    </style>

    <div class="div-alerta-erro ms-5 d-none" id="div-alerta-erro">
        <span class="alerta-erro" id="alerta-erro"></span>
    </div>
    <style>
        .div-alerta-erro {
            position: fixed;
            top: 10%;
            left: 3%;
            background-color: #eb4c34;
            color: #fff;
            border-radius: 8px;
            padding: 15px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .alerta-erro {
            flex: 1;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .div-alerta-erro {
            animation: fadeIn 0.5s ease-out;
        }
    </style>

    <script>
        function redirecionaindexAdm(){
            window.location.href = "http://localhost/tcc_html/pages/index.php";
        }
        document.getElementById("btnindex").addEventListener("click",redirecionaindexAdm);
    </script>

    <h1 class="text-center mt-5 mb-3">Login Administrador</h1>
    <form method="post" id="formLoginAdmin">
    <div class="grid-container d-flex justify-content-center">
            <div class="col-4">
                <div class="grid-item">
                    <label for="email_admin">E-mail</label>
                    <br>
                    <input type="text" name="email_admin" id="email_admin" class="form-control">
                    <small id="aviso_email" class="text-danger aviso"></small>
                </div>
                <br>
                <div class="grid-item">
                    <label for="senha_admin">Senha</label>
                    <br>
                    <input type="password" name="senha_admin" id="senha_admin" class="form-control">
                    <small id="aviso_senha" class="text-danger aviso"></small>
                    <button type="button" id="mostrarSenha" class="btn btn-link link-danger link-offset-2 link-underline link-underline-opacity-0">Mostrar senha</button>
                </div>
                <script>
                    const senha = document.getElementById("senha_admin"); 
                    const mostrar = document.getElementById("mostrarSenha");
                    mostrar.addEventListener("click",acao_mostrar);
                    function acao_mostrar(){
                        if(senha.type == "password"){
                            senha.type = "text";
                            mostrar.textContent = "Ocultar senha";
                        }else{
                            senha.type = "password";
                            mostrar.textContent = "Mostrar senha";
                        }
                    }
                </script>
                <button id="btnLoginAdmin" type="submit" class="form-control btn btn-danger mb-2 mt-5" style="width: 280px; height: 38px;">Entrar como administrador</button>
            </div> 
        </div>
    </form>
    <script src="../assets/javascripts/scripts_login_administrador.js"></script>
    <script src="../assets/javascripts/valida_login_admin.js"></script>
</body>
</html>