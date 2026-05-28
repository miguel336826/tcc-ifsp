<?php
    include "../includes/header.php";
?>

<link rel="stylesheet" href="../assets/css/slide.css">

<div class="container">
    <h1 id="mensagem"></h1>
</div>
<style>
    #mensagem {
    font-size: 4rem;
    color: #c90c1f;
    text-align: left;
    margin-left: 0;
    font-weight: 700;
    font-family: 'Poppins', sans-serif;
    opacity: 0;
    transform: translateX(-50px);
    animation: fadeInLeft 1.5s ease-out forwards;
    }
    @keyframes fadeInLeft {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    .container {
        padding-left: 20px;
    }
</style>

<section class="slider">
    <div class="slider-content">
        <input type="radio" name="btn-radio" id="radio1">
        <input type="radio" name="btn-radio" id="radio2">
        <input type="radio" name="btn-radio" id="radio3">
        <input type="radio" name="btn-radio" id="radio4">

        <div class="slider-box primeiro">
            <!--porcentagem-->
            <a href="../pages/videoaulas.php"><img class="img-desktop" src="../images/porcentagem_desktop.png" alt="slide 1"></a>
            <a href="../pages/videoaulas.php"><img class="img-mobile" src="../images/porcentagem_mobile.png" alt="slide 1"></a>
        </div>
        <div class="slider-box">
            <!--potenciacao-->
            <a href="../pages/videoaulas.php"><img class="img-desktop" src="../images/potenciacao_desktop.png" alt="slide 1"></a>
            <a href="../pages/videoaulas.php"><img class="img-mobile" src="../images/potenciacao_mobile.png" alt="slide 1"></a>
        </div>
        <div class="slider-box">
            <!--fracao-->
            <a href="../pages/videoaulas.php"><img class="img-desktop" src="../images/fracao_desktop.png" alt="slide 1"></a>
            <a href="../pages/videoaulas.php"><img class="img-mobile" src="../images/fracao_mobile.png" alt="slide 1"></a>
        </div>
        <div class="slider-box">
            <!--formulas-->
            <a href="../pages/formulas.php"><img class="img-desktop" src="../images/formulas.png" alt="slide 1"></a>
            <a href="../pages/formulas.php"><img class="img-mobile" src="../images/formulas_mobile.png" alt="slide 1"></a>
        </div>

        <div class="nav-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
        </div>

        <div class="nav-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>

    </div>
</section>

    <style>
        .card{
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            box-sizing: border-box;
            position: relative;
            overflow: hidden;
        }
        .card h2 {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
            color: #fff;
        }
        .card a {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
            width: calc(100% - 40px);
        }
        .card-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            z-index: 0;
        }
    </style>

    <div class="row col-12 d-flex justify-content-center mt-5">
        <div class="card mt-4 ms-4 me-4" style="width: 25rem; height: 32rem; border-radius: 10px 10px 10px 10px;">
            <div class="card-background" style="background-image: url('../images/textos.jpg');"></div>
            <h2 class="text-center">Textos</h2>
            <a href="../pages/textos.php" class="btn btn-danger">Acessar</a>
        </div>
        <div class="card mt-4 ms-4 me-4" style="width: 25rem; height: 32rem; border-radius: 10px 10px 10px 10px;">
            <div class="card-background" style="background-image: url('../images/exercicios.jpg');"></div>
            <h2 class="text-center">Exercícios</h2>
            <a href="../pages/exercicios.php" class="btn btn-danger">Acessar</a>
        </div>
        <div class="card mt-4 ms-4 me-4" style="width: 25rem; height: 32rem; border-radius: 10px 10px 10px 10px;">
            <div class="card-background" style="background-image: url('../images/videoaulas.jpg');"></div>
            <h2 class="text-center">Videoaulas</h2>
            <a href="../pages/videoaulas.php" class="btn btn-danger">Acessar</a>
        </div>
        <div class="card mt-4 ms-4 me-4" style="width: 25rem; height: 32rem; border-radius: 10px 10px 10px 10px;">
            <div class="card-background" style="background-image: url('../images/formulas.jpg');"></div>
            <h2 class="text-center">Fórmulas</h2>
            <a href="../pages/formulas.php" class="btn btn-danger">Acessar</a>
        </div>
    </div>

    <script src="../assets/javascripts/controle_de_acesso_home.js"></script>
    <script src="../assets/javascripts/slide.js"></script>
    <script src="../assets/javascripts/script_mensagem.js"></script>

<?php
    include "../includes/footer.php";
?>