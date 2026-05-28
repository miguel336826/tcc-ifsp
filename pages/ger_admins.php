<?php
include "../includes/header.php";
include "../includes/functions.php";
?>

<div class="alerta" id="alerta">

<!--<script src="../assets/javascripts/controle_de_acesso_admin.js"></script>-->

</div>
    <h1 class="text-center mt-4 mb-4">Administrar administradores</h1>
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
                <tbody id="lista-admins">
                    
                </tbody>
            </table>
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

                <label for="sobrenome-admin-editar">Sobrenome:</label>
                <input type="text" name="sobrenome-admin-editar" id="sobrenome-admin-editar" class="form-control" placeholder="Digite o novo sobrenome">

                <label for="nascimento-admin-editar">Nascimento:</label>
                <input type="text" name="nascimento-admin-editar" id="nascimento-admin-editar" class="form-control" placeholder="Digite a nova data">

                <label for="email-admin-editar">E-mail:</label>
                <input type="text" name="email-admin-editar" id="email-admin-editar" class="form-control" placeholder="Digite o novo E-mail">

                <button id="btnSalvarEditarAdmin" class="form-control btn btn-danger mb-2 mt-2">Enviar</button>
                <button id="btnModalEditarAdminNao" class="form-control btn btn-outline-danger">Fechar</button>
            </form>
        </div>
    </div>

    <div class="text-center">
        <a href="../pages/cadastro_administrador.php" class="btn btn-outline-primary mt-5">Cadastrar novo administrador</a>
    </div>
    
    <script src="../assets/javascripts/script_ger_admins.js"></script>
    <script src="../assets/javascripts/controle_de_acesso_admin.js"></script>

<?php
include "../includes/footer.php";
?>