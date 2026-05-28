<?php
include "../includes/header.php";
include "../includes/functions.php";
include "../includes/messages.php";
?>
      <!-- mathjax -->
      <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/mathjax@2/MathJax.js?config=TeX-AMS_CHTML"></script>
    
    <div class="alerta" id="alerta">
    </div>

    <!--<div class="div text-center">
        <h1 id="titulo" class="text-danger"></h1>
        <h2 id="conteudo" class="mb-5 mt-5"></h2>
    </div>-->

    <div class="container-texto" id="container-texto">
    </div>

    <style>
        #container-texto {
            display: flex;
            flex-direction: column;
            gap: 20px; 
            padding: 0 20px;
            justify-content: center;
        }
        .texto-card {
            background-color: #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            box-sizing: border-box;
            width: 100%;
            overflow-wrap: break-word;
            word-wrap: break-word;
            overflow: hidden;
        }
        .texto-card h2, .texto-card p {
            margin: 0 0 10px;
            overflow-wrap: break-word;
        }
    </style>


    <script src="../assets/javascripts/script_info_texto.js"></script>
<?php
include "../includes/footer.php";
?>