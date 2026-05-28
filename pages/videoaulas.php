<?php
include "../includes/header.php";
//include "../includes/messages.php";
include "../includes/functions.php";
?>
    <div class="alerta mt-5 mb-5 ms-5 me-5" id="alerta"></div>

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
            animation: fadeIn 0.5s ease-out;
        }
        .alerta-sucesso {
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

    <h1 class="text-center mt-2">Videoaulas</h1>

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
        #container-videos {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 0 20px;
            justify-content: space-between;
        }
        .video-card {
            background-color: #ddd;
            flex: 1 1 calc(50% - 20px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        .video-card h2, .video-card h3 {
            margin: 0 0 10px;
        }
        .video-card .btn {
            display: inline-block;
            margin-top: 10px;
        }
    </style>
    <div class="btnAddVideoaula" id="btnAddVideoaula">
        <a href="./adicionar_videoaula.php" class="icon"><i class="classe"></i><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/></svg></a>
    </div>

    <div class="container-videos" id="container-videos"></div>

    <script>
        const admin_id = localStorage.getItem("id_admin");
        const admin_token = localStorage.getItem("token_admin");

        if(admin_id && admin_token){
            document.getElementById("btnAddVideoaula").classList.remove("hidden");
        } else{
            document.getElementById("btnAddVideoaula").classList.add("hidden");
        }
    </script>
    
    <script src="../assets/javascripts/script_adicionar_videoaula.js"></script>
    <script src="../assets/javascripts/script_carregar_videoaulas.js"></script>
<?php
include "../includes/footer.php";
?>