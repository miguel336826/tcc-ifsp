<?php
    include "../includes/header.php";
    include "../includes/functions.php";
    //include "../includes/messages.php";
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

    <h1 class="text-center mt-2 mb-4">Nova Fórmula</h1>
    <form method="post" id="formAddFormula">
        <div class="grid-container d-flex justify-content-center">
            <div class="col-4">
                <div class="grid-item">
                    <label for="titulo_fo">Título</label>
                    <br>
                    <input type="text" name="titulo_fo" id="titulo_fo" class="form-control">
                </div>
                <br>
                <div class="grid-item">
                    <label for="materia">Matéria</label>
                    <br>
                    <input type="text" name="materia" id="materia" class="form-control">
                </div>
                <br>
                <div class="grid-item">
                    <label for="expressao">Expressão | fórmula</label>
                    <br>
                    <textarea name="expressao" id="expressao" class="form-control"></textarea>
                </div>
                <br>
                <div class="grid-item">
                    <button id="btnAdicionarFormula" type="submit" class="btn btn-danger mt-2 mb-2" style="width: 109px; height: 38px;">Enviar</button>
                    <br>
                    <a href="../pages/formulas.php" class="btn btn-danger mt-2 mb-2" style="width: 109px; height: 38px;">Voltar</a>
                </div>
            </div>
        </div>
    </form>

<script src="../assets/javascripts/script_adicionar_formula.js"></script>
<script src="../assets/javascripts/controle_de_acesso_admin.js"></script>

<?php
    include "../includes/footer.php";
?>