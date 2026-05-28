<?php
include "../includes/header.php";
include "../includes/functions.php";
//include "../includes/messages.php";
?>

    <style>
        #videoplayer{
            position: relative;
            display: block;
            width: 90%;
            height: 0;
            margin: auto;
            padding: 0% 0% 56.25%;
            overflow: hidden;
        }
        #videoplayer iframe{
            position: absolute;
            top: 0; bottom: 0; left: 0;
            width: 100%;
            height: 100%;
            border: 0;
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
        #container-comentarios {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 0 20px;
            justify-content: space-between;
        }
        .comentario-card {
            background-color: #ddd;
            flex: 1 1 calc(50% - 20px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 20px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        .nome-sobrenome-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .nome-usuario {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
        }
        .sobrenome-usuario {
            font-size: 1.2rem;
            font-weight: 400;
            color: #555;
        }
        .texto-comentario {
            font-size: 1rem;
            line-height: 1.6;
            margin: 0;
            padding: 15px 0;
        }
    </style>
    
    <div class="alerta" id="alerta"></div>

    <div class="div text-center">
        <h1 id="titulo_vd" class="text-danger"></h1>
        <h2 id="descricao_vd" class="mb-5"></h2>
        <div id="videoplayer"></div>
    </div>

    <div class="d-flex align-items-center">
        <button id="adicionarComentarioModal" class="btn btn-danger ms-4 me-2 mt-5 mb-4">Adicionar um comentário</button>
        <div class="dropdown mt-5 mb-4">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Opções
            </button>
            <ul class="dropdown-menu">
                <li><button class="dropdown-item" id="excluir_comentarios">Excluir meus comentários</button></li>
            </ul>
        </div>
    </div>


    <div id="modal-adicionar-comentario" class="modal">
    <div class="modal-content">
        <h3 class="text-center">No que está pensando?</h3>
        <form id="formAdicionarComentario">
            <input type="text" id="id_usuario" name="id_usuario" class="d-none">
            <input type="text" id="id_videoaula" name="id_videoaula" class="d-none">
            <input type="text" id="nome_usuario" name="nome_usuario" class="d-none">
            <input type="text" id="sobrenome_usuario" name="sobrenome_usuario" class="d-none">

            <input type="text" name="texto_comentario" id="texto_comentario" class="form-control" placeholder="Escreva seu comentário">

            <button id="btnAdicionarComentario" class="form-control btn btn-danger mb-2 mt-2">Enviar</button>
            <button id="btnCancelarAdicionarComentario" class="form-control btn btn-outline-danger">Cancelar</button>
        </form>
    </div>
    </div>

    <script>
        const id_usuario = parseInt(localStorage.getItem("id_usuario"));
        const nome_usuario = localStorage.getItem("nome_usuario");
        const sobrenome_usuario = localStorage.getItem("sobrenome_usuario");
        const link_w = window.location.search;
        console.log("link_w: "+link_w);
        const elementosUrl = new URLSearchParams(link_w);
        const id_videoaula = elementosUrl.get("id_videoaula");
        document.getElementById("id_usuario").value = id_usuario;
        document.getElementById("id_videoaula").value = id_videoaula;
        document.getElementById("nome_usuario").value = nome_usuario;
        document.getElementById("sobrenome_usuario").value = sobrenome_usuario;
    </script>

    <div class="container-comentarios" id="container-comentarios">
    </div>

    <script src="../assets/javascripts/script_carregar_videoplayer.js"></script>
    <script src="../assets/javascripts/script_adicionar_comentario.js"></script>
<?php
include "../includes/footer.php";
?>