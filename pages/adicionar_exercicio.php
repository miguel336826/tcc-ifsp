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

<h1 class="text-center mt-2 mb-4">Novo Exercício</h1>

<form method="post" id="formAddExercicio">
    <div class="grid-container d-flex justify-content-center">
        <div class="col-4">
        <div class="grid-item">
            <label for="enunciado">Enunciado</label>
            <br>
            <textarea name="enunciado" id="enunciado" class="form-control"></textarea>
        </div>
        <br>
        <div class="grid-item">
            <label for="comando">Comando</label>
            <br>
            <textarea name="comando" id="comando" class="form-control"></textarea>
        </div>
        <br>
        <div class="grid-item">
            <label for="alt_a">Alternativa A</label>
            <br>
            <input type="text" name="alt_a" id="alt_a" class="form-control">   
        </div>
        <br>
        <div class="grid-item">
            <label for="alt_b">Alternativa B</label>
            <br>
            <input type="text" name="alt_b" id="alt_b" class="form-control">   
        </div>
        <br>
        <div class="grid-item">
            <label for="alt_c">Alternativa C</label>
            <br>
            <input type="text" name="alt_c" id="alt_c" class="form-control">   
        </div>
        <br>
        <div class="grid-item">
            <label for="alt_d">Alternativa D</label>
            <br>
            <input type="text" name="alt_d" id="alt_d" class="form-control">   
        </div>
        <br>
        <div class="grid-item">
            <label for="alt_e">Alternativa E</label>
            <br>
            <input type="text" name="alt_e" id="alt_e" class="form-control">    
        </div>
        <br>
        <div class="grid-item">
            <label for="correto">Alternativa correta</label>
            <br>
            <input type="text" name="correto" id="correto" class="form-control">   
        </div>
        <br>
        <div class="grid-item">
            <label for="explicacao">Explicação da resposta correta</label>
            <br>
            <textarea name="explicacao" id="explicacao" class="form-control"></textarea>
        </div>
        <br>
        <div class="grid-item">
            <label for="id_assunto">ID do assunto</label>
            <br>
            <input type="text" name="id_assunto" id="id_assunto" class="form-control">   
        </div>
        <br>
        <div class="grid-item">
            <button id="btnAdicionarExercicio" type="submit" class="btn btn-danger mt-2 mb-2" style="width: 109px; height: 38px;">Enviar</button>
            <br>
            <a href="../pages/exercicios.php" class="btn btn-danger mt-2 mb-2" style="width: 109px; height: 38px;">Voltar</a>
        </div>
        </div>
    </div>
</form>

<script src="../assets/javascripts/script_adicionar_exercicio.js"></script>
<script src="../assets/javascripts/controle_de_acesso_admin.js"></script>

<?php
include "../includes/footer.php";
?>