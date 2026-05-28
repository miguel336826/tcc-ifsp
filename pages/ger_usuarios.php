<?php
include "../includes/header.php";
include "../includes/functions.php";
?>

<div class="alerta" id="alerta">

<!--<script src="../assets/javascripts/controle_de_acesso_admin.js"></script>-->

</div>
    <h1 class="text-center mt-4 mb-4">Administrar usuários</h1>
    <div class="container">
        <div class="table-detail">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Nascimento</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody id="lista-usuarios">
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center">
        <a href="../pages/cadastro_usuario.php" class="btn btn-outline-primary mt-5">Cadastrar novo usuário</a>
    </div>

    <div id="modal-excluir-usuario" class="modal">
        <div class="modal-content">
            <h3 class="text-center">Excluir?</h3>
            <h4 class="text-center mb-4">Esse usuário será removido</h4>
            <button id="btnExcluirUsuario" class="form-control btn btn-danger mb-2 mt-2">Excluir</button>
            <button id="btnCancelarExcluirUsuario" class="form-control btn btn-outline-danger">Cancelar</button>
        </div>
    </div>

    <div id="modal-editar-usuario" class="modal">
        <div class="modal-content">
            <h3 class="text-center">Editar dados</h3>
            <form id="formEditarUsuario">
                <input type="hidden" id="id-editar-usuario">
                <label for="nome-usuario-editar">Nome:</label>
                <input type="text" name="nome-usuario-editar" id="nome-usuario-editar" class="form-control" placeholder="Digite o novo nome">

                <label for="sobrenome-usuario-editar">Sobrenome:</label>
                <input type="text" name="sobrenome-usuario-editar" id="sobrenome-usuario-editar" class="form-control" placeholder="Digite o novo sobrenome">

                <label for="nascimento-usuario-editar">Nascimento:</label>
                <input type="text" name="nascimento-usuario-editar" id="nascimento-usuario-editar" class="form-control" placeholder="Digite a nova data">

                <label for="email-usuario-editar">E-mail:</label>
                <input type="text" name="email-usuario-editar" id="email-usuario-editar" class="form-control" placeholder="Digite o novo E-mail">

                <button id="btnEditarUsuario" class="form-control btn btn-danger mb-2 mt-2">Enviar</button>
                <button id="btnCancelarEditarUsuario" class="form-control btn btn-outline-danger">Cancelar</button>
            </form>
        </div>
    </div>
    
    <script src="../assets/javascripts/script_ger_usuarios.js"></script>
    <script src="../assets/javascripts/controle_de_acesso_admin.js"></script>

<?php
include "../includes/footer.php";
?>