<?php
include "../includes/header.php";
include "../includes/functions.php";
?>

    <canvas id="confetti"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
    <script>
        const jsConfetti = new JSConfetti()
        //jsConfetti.addConfetti()
    </script>
    <style>
        #confetti{
            position: fixed;
            top: 0px;
            left: 0px;
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
            animation: fadeIn 0.5s ease-out;
        }
        .alerta-erro {
            flex: 1;
        }
        @keyframes fadeIn {
            from{
                opacity: 0;
                transform: translateY(-20px);
            }
            to{
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>


    <div class="alerta z-1 position-fixed" id="alerta"></div>
    <style>
        .alerta {
            position: fixed;
            top: 30px;
            right: 10px;
            z-index: 1000;
        }
        .icon{
            position: fixed;
            bottom: 60px;
            right: 30px;
            font-size: 30px;
            background-color: #B71818;
            color: #ffffff;
            border-radius: 50%;
            padding: 3px;
            width: 50px;
            height: 50px;
            text-align: center;
            text-decoration: none;
            z-index: 100;
            box-shadow: 2px 2px 2px #B71818;
        }
        .icon .classe{
            padding-top: 9px;
        }
        .icon:hover{
            background-color: #B71818;
            color: #B71818;
            font-weight: 900;
            box-shadow: 2px 2px 2px #B71818;
        }
        .hidden{
            display: none;
        }
        #container-exercicios {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 0 20px;
            justify-content: space-between;
        }
        .exercicio-card {
            background-color: #ddd;
            flex: 1 1 calc(50% - 20px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        .exercicio-card h2, .exercicio-card h3 {
            margin: 0 0 10px;
        }
        .exercicio-card .btn {
            display: inline-block;
            margin-top: 10px;
        }
        .list-group-item {
            cursor: pointer;
        }
        .list-group-item:hover {
            background-color: #c8cacc;
            border-radius: 5px;
        }
    </style>

    <div class="btnAddExercicio" id="btnAddExercicio">
        <a href="./adicionar_exercicio.php" class="icon"><i class="classe"></i><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/></svg></a>
    </div>

    <div class="container-exercicios" id="container-exercicios"></div>

    <script>
        const admin_idd = localStorage.getItem("id_admin");
        const admin_tokend = localStorage.getItem("token_admin");

        if(admin_idd && admin_tokend){
            document.getElementById("btnAddExercicio").classList.remove("hidden");
        } else{
            document.getElementById("btnAddExercicio").classList.add("hidden");
        }
    </script>

    <script src="../assets/javascripts/script_carregar_exercicios.js"></script>

<?php
include "../includes/footer.php";
?>