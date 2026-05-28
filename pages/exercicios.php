<?php
include "../includes/header.php";
include "../includes/functions.php";
?>

    <style>
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
        #container-assuntos {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 0 20px;
            justify-content: space-between;
        }
        .assunto-card {
            background-color: #ddd;
            flex: 1 1 calc(50% - 20px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        .assunto-card h2, .assunto-card h3 {
            margin: 0 0 10px;
        }
        .assunto-card .btn {
            display: inline-block;
            margin-top: 10px;
        }
    </style>

    <h1 class="text-center mt-2">Exercícios</h1>

    <div class="btnAddExercicio" id="btnAddExercicio">
        <a href="./adicionar_assunto_exercicio.php" class="icon"><i class="classe"></i><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/></svg></a>
    </div>

    <div class="container-assuntos" id="container-assuntos"></div>

    <script>
        const admin_id = localStorage.getItem("id_admin");
        const admin_token = localStorage.getItem("token_admin");

        if(admin_id && admin_token){
            document.getElementById("btnAddExercicio").classList.remove("hidden");
        } else{
            document.getElementById("btnAddExercicio").classList.add("hidden");
        }
    </script>

    <script src="../assets/javascripts/script_carregar_assuntos.js"></script>

<?php
include "../includes/footer.php";
?>