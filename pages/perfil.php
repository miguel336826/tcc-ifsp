<?php
include "../includes/header.php";
include "../includes/functions.php";
?>
<div class="alerta" id="alerta">
</div>

<div class="div text-center">
</div>

<!--<div class="imagem">
    <img id="imagemdoperfil" src="" alt="Imagem de perfil do usuário" class="mb-5">
</div>-->
<style>
    #imagemdoperfil {
    width: 350px;
    height: 350px;
    border-radius: 100%;
    border: 7px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    border-style: double;
    border-color: black;
    text-shadow: 10px 10px;
    }
    #cont1 {
        font-family: 'Poppins', sans-serif;
        background-color: #f7f7f7;
        width: 100%;
    }
</style>
<div class="container">
    <div class="container" id="cont1">
        <br>
        <div id="container-perfil-admin" class="container text-center d-none">
            <!--
            <div class="d-flex flex-wrap justify-content-center align-items-center">    
                <a href="../pages/ger_admins.php" class="btn bnt-outline-info">Gerenciar: Admins.</a>
                <a href="../pages/ger_usuarios.php" class="btn bnt-outline-info">Gerenciar: Usuários</a>
            </div>
            -->
        </div id="fonte1">


<div id="container-perfil-usuario" class="container text-center mt-5 d-none">
    <div class="d-flex flex-wrap justify-content-center align-items-center mt-5">    
        <a href="../pages/ger_admins.php" class="link-offset-2 link-underline link-underline-opacity-0 me-5">Gerenciar: Admins.</a>
        <a href="../pages/ger_usuarios.php" class="link-offset-2 link-underline link-underline-opacity-0 ms-5">Gerenciar: Usuários</a>
    </div>

    <!--
    <div class="d-flex flex-wrap justify-content-center align-items-center">    
        <button id="botoes" class="mb-3 mt-4 ms-3">Logout</button>    
        <button id="botoes" class="mb-3 mt-4 ms-3">Excluir conta</button>
        <button id="botoes" class="mb-3 mt-4 ms-3">Editar dados</button>
    </div>
    -->
</div>

    <script>
        const admin_id = localStorage.getItem("id_admin");
        const admin_token = localStorage.getItem("token_admin");

        if(admin_id != "" && admin_token != ""){
            document.getElementById("container-perfil-admin").classList.remove("d-none");
        } else{
            document.getElementById("container-perfil-admin").classList.add("d-none");
        }

        const usuario_id = localStorage.getItem("id_usuario");
        const usuario_token = localStorage.getItem("token_usuario");
        
        if(usuario_id != "" && usuario_token != ""){
            document.getElementById("container-perfil-usuario").classList.remove("d-none");
        } else{
            document.getElementById("container-perfil-usuario").classList.add("d-none");
        }
    </script>

<div id="modal-excluir-usuario" class="modal">
    <div class="modal-content">
        <h3 class="text-center">Excluir dados da conta?</h3>
        <h4 class="text-center mb-4">Seu perfil e progresso será perdido.</h4>
        <button id="btnModalExcluirUsuarioSim" class="form-control btn btn-danger mb-2 mt-2">Sim</button>
        <button id="btnModalExcluirUsuarioNao" class="form-control btn btn-outline-danger">Não</button>
    </div>
</div>

<div id="modal-editar-usuario" class="modal">
    <div class="modal-content">
        <h3 class="text-center">Editar dados</h3>
        <form id="formEditarUsuario">
            <input type="hidden" id="id-editar-usuario">
            <label for="nome-usuario-editar">Nome:</label>
            <input type="text" name="nome-usuario-editar" id="nome-usuario-editar" class="form-control" placeholder="Digite o novo nome">
            <small id="aviso_nome" class="text-danger aviso"></small>

            <label for="sobrenome-usuario-editar">Sobrenome:</label>
            <input type="text" name="sobrenome-usuario-editar" id="sobrenome-usuario-editar" class="form-control" placeholder="Digite o novo sobrenome">
            <small id="aviso_sobrenome" class="text-danger aviso"></small>

            <label for="nascimento-usuario-editar">Nascimento:</label>
            <input type="text" name="nascimento-usuario-editar" id="nascimento-usuario-editar" class="form-control" placeholder="Digite a nova data">
            <small id="aviso_nascimento" class="text-danger aviso"></small>

            <label for="email-usuario-editar">E-mail:</label>
            <input type="text" name="email-usuario-editar" id="email-usuario-editar" class="form-control" placeholder="Digite o novo E-mail">
            <small id="aviso_email" class="text-danger aviso"></small>

            <button id="btnSalvarEditarUsuario" class="form-control btn btn-danger mb-2 mt-2">Enviar</button>
            <button id="btnModalEditarUsuarioNao" class="form-control btn btn-outline-danger">Fechar</button>
        </form>
    </div>
</div>

<div id="modal-excluir-admin" class="modal">
    <div class="modal-content">
        <h3 class="text-center">Excluir dados da conta?</h3>
        <h4 class="text-center mb-4">Seu perfil e progresso será perdido.</h4>
        <button id="btnModalExcluirAdminSim" class="form-control btn btn-danger mb-2 mt-2">Sim</button>
        <button id="btnModalExcluirAdminNao" class="form-control btn btn-outline-danger">Não</button>
    </div>
</div>

<div id="modal-editar-admin" class="modal">
    <div class="modal-content">
        <h3 class="text-center">Editar dados</h3>
        <form id="formEditarAdmin">
            <input type="hidden" id="id-editar-admin">
            <label for="nome-admin-editar">Nome:</label>
            <input type="text" name="nome-admin-editar" id="nome-admin-editar" class="form-control" placeholder="Digite o novo nome">
            <small id="aviso_nome" class="text-danger aviso"></small>

            <label for="sobrenome-admin-editar">Sobrenome:</label>
            <input type="text" name="sobrenome-admin-editar" id="sobrenome-admin-editar" class="form-control" placeholder="Digite o novo sobrenome">
            <small id="aviso_sobrenome" class="text-danger aviso"></small>

            <label for="nascimento-admin-editar">Nascimento:</label>
            <input type="text" name="nascimento-admin-editar" id="nascimento-admin-editar" class="form-control" placeholder="Digite a nova data">
            <small id="aviso_nascimento" class="text-danger aviso"></small>

            <label for="email-admin-editar">E-mail:</label>
            <input type="text" name="email-admin-editar" id="email-admin-editar" class="form-control" placeholder="Digite o novo E-mail">
            <small id="aviso_email" class="text-danger aviso"></small>

            <button id="btnSalvarEditarAdmin" class="form-control btn btn-danger mb-2 mt-2">Enviar</button>
            <button id="btnModalEditarAdminNao" class="form-control btn btn-outline-danger">Fechar</button>
        </form>
    </div>
</div>

<script src="../assets/javascripts/script_perfil_usuario.js"></script>
<script src="../assets/javascripts/script_perfil_administrador.js"></script>
<script src="../assets/javascripts/controle_de_acesso_home.js"></script>
<br>
</div>
</div>
<hr>
    <footer class="d-flex flex-wrap justify-content-center align-items-center mt-5 mb-5" id="footer1">

        <div class="row">
            <div class="col-md-4 text-center">
                <h3 class="mb-3">Avalie-nos</h3>
                <a href="../pages/sobre.php" class="link-danger link-offset-2 link-underline link-underline-opacity-0">Avaliar</a>
            </div>
            <div class="col-md-4 text-center">
                <h3 class="mb-3">Sobre</h3>
                <p>Esse website faz parte de um projeto que foi criado por três alunos do ensino médio em Araraquara SP</p>
                <a href="../pages/sobre.php" class="link-danger link-offset-2 link-underline link-underline-opacity-0">Saiba mais</a>
            </div>
            <div class="col-md-4 text-center">
                <h3 class="mb-3">Desconectar</h3>
                <button id="btnLogoutUsuario" class="btn btn-dark">Sair (logout)</button>
            </div>
        </div>
    </footer>

    <script src="../assets/javascripts/script_logout_usuario.js"></script>
</body>
</html>