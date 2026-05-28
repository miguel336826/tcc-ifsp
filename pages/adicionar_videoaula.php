<?php
include "../includes/header.php";
include "../includes/functions.php";
?>

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

<div class="alerta" id="alerta"></div>

<h1 class="text-center mt-2 mb-4">Nova Videoaula</h1>

<form method="post" id="formAddVideoaula">
    <div class="grid-container d-flex justify-content-center">
        <div class="col-4">
        <div class="grid-item">
            <label for="titulo_va">Título</label>
            <br>
            <input type="text" name="titulo_va" id="titulo_va" class="form-control">
        </div>
        <br>
        <div class="grid-item">
            <label for="descricao">Descrição</label>
            <br>
            <input type="text" name="descricao" id="descricao" class="form-control">   
        </div>
        <br>
        <div class="grid-item">
            <label for="link">Link</label>
            <br>
            <input type="text" name="link" id="link" class="form-control">   
        </div>
        <br>
        <div class="grid-item">
            <button id="btnAdicionarVideoaula" type="submit" class="btn btn-danger mt-2 mb-2" style="width: 109px; height: 38px;">Enviar</button>
            <br>
            <a href="../pages/videoaulas.php" class="btn btn-danger mt-2 mb-2" style="width: 109px; height: 38px;">Voltar</a>
        </div>
        </div>
    </div>
</form>

<script src="../assets/javascripts/script_adicionar_videoaula.js"></script>
<script src="../assets/javascripts/controle_de_acesso_admin.js"></script>

<?php
include "../includes/footer.php";
?>