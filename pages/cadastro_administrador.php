<?php
    include "../includes/functions.php";
    include "../includes/header.php";
    //include "../includes/messages.php";
?>
    <div class="div-alerta-sucesso ms-5 d-none" id="div-alerta-sucesso">
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

    <h1 class="text-center mt-4 mb-4">Cadastrar Administrador</h1>
    <form method="post" id="formAdmin">
        <div class="row justify-content-evenly">
            <div class="col-4">
                <div class="grid-item">
                    <label for="nome_admin">Nome</label>
                    <br>
                    <input type="text" name="nome_admin" id="nome_admin" class="form-control">
                    <small id="aviso_nome" class="text-danger aviso"></small>
                </div>
                    <br>
                <div class="grid-item">
                    <label for="sobrenome_admin">Sobrenome</label>
                    <br>
                    <input type="text" name="sobrenome_admin" id="sobrenome_admin" class="form-control">
                    <small id="aviso_sobrenome" class="text-danger aviso"></small>
                </div>
                    <br>
                <div class="grid-item">
                    <label for="nascimento_admin">Data de nascimento</label>
                    <br>
                    <input type="text" name="nascimento_admin" id="nascimento_admin" class="form-control">
                    <small id="aviso_nascimento" class="text-danger aviso"></small>
                </div>
                    <br>
                <div class="grid-item">
                    <label for="email_admin">E-mail</label>
                    <br>
                    <input type="text" name="email_admin" id="email_admin" class="form-control">
                    <small id="aviso_email" class="text-danger aviso"></small>
                </div>
            </div>
            <div class="col-4">
                <label for="senha_admin">Senha</label>
                <br>
                <input type="password" name="senha_admin" id="senha_admin" class="form-control">
                <small id="aviso_senha" class="text-danger aviso"></small>
                <button type="button" id="mostrarSenha" class="btn">Mostrar senha</button>
                <script>
                    //linhas de código para mostrar senha (https://medium.com/walternascimentobarroso-pt/exibindo-senha-com-javascript-3cfb2d011c7a)
                    const senha = document.getElementById("senha_admin"); 
                    const mostrar = document.getElementById("mostrarSenha");
                    mostrar.addEventListener("click",acao_mostrar);
                    function acao_mostrar(){
                        if(senha.type == "password"){
                            senha.type = "text";
                            mostrar.textContent = "Ocultar senha";
                        } else{
                            senha.type = "password";
                            mostrar.textContent = "Mostrar senha";
                        }
                    }
                </script>
                <button id="btnAdicionarAdmin" type="submit" class="btn btn-danger mt-2 mb-2" style="width: 109px; height: 38px;">Enviar</button>
                <br>
                <a href="../pages/login_administrador.php" class="link-secondary link-offset-2 link-underline link-underline-opacity-0">Já possui uma conta? Faça Login aqui</a>
            </div>
        </div>
    </form>

    <script src="../assets/javascripts/scripts_administrador.js"></script>
    <script src="../assets/javascripts/controle_de_acesso_admin.js"></script>
    <script src="../assets/javascripts/valida_cadastro_admin.js"></script>

    <?php
    include "../includes/footer.php";
    ?>