<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - Matemágico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dynalight&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #000000;
        }
        .hero-section {
            background-color: #a51b0b;
            color: white;
            text-align: center;
            border-radius: 5px 150px;
            margin: 3%;
            padding: 3%;
        }
        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.2rem;
            margin-bottom: 0;
        }
        .content-section {
            padding: 50px 0;
        }
        .content-section h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            font-weight: bold;
        }
        .content-section p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        footer {
            margin-top: 50px;
            padding: 10px 0;
            text-align: center;
        }
        #border {
            border: 2%;
            border-style: dashed;
            border-radius: 50px;
            padding: 2%;
            border-color: #a51b0b;
        }
        #link {
            color: #a51b0b;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 30%;
            border-radius: 50%;
            border: 4px;
            border-style: double;
            border-color: #a51b0b;
        }
        #dynalight-regular {
            font-family: "Dynalight", cursive;
            font-weight: 400;
            font-style: normal;
            font-size: 35px;
            font-weight: bold;
        }
        table {
            text-align: center;
        }
    </style>
</head>
<body>

    <section class="hero-section">
        <div class="container">
            <h1>Estamos mudando a forma como as pessoas pensam sobre a  <span id="sector">Matemática</span>.</h1>
            <p>No <span id="company-name">Matemágico</span>, nossa missão é tornar <span id="sector-lower"></span> mais acessível e transparente para todos.</p>
        </div>
    </section>

    <section class="content-section">
        <div class="container">

            <div class="container" id="border">
                <h2>Por que somos diferentes?</h2>
                <p>Trabalhamos com parceiros que compartilham nossos valores e visão. Estamos sempre à frente, adotando novas tecnologias e práticas para oferecer a melhor experiência. Mantemos um forte compromisso com a segurança e a proteção dos dados dos nossos estudantes.</p>
            </div>
            <br><br>
            <div class="container" id="border">
                <h2>Por que escolher o <span id="company-name-2"> Matemágico</span>?</h2>
                <p>Acreditamos que todos merecem acesso à um bom material e uma base de matemática <span id="main-benefit"></span>. É por isso que criamos uma experiência que é intuitiva, fácil de usar e adaptada às suas necessidades. Seja você novo no <span id="sector-lower-2">Matemágico</span> ou um veterano experiente, o <span id="company-name-3">Matemágico</span> está aqui para ajudar você a alcançar seus objetivos de maneira simples e eficiente.</p>
            </div>
            <br><br>
            <center>
                <a href="index.php" id="link"><p>Junte-se a nós e descubra uma nova maneira de <span id="action"> gostar da matemática</span>.</p>
                </a>
            <br><br>
            <div class="container-fluid">
                <table id="dynalight-regular">
                    <tr>
                        <td>
                            <img src="../images/nayara.jpg" alt="" >
                        </td>
                        <td>
                            <img src="../images/miguel.jpg" alt="" >
                        </td>
                        <td>
                            <img src="../images/olavo.jpg" alt="" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nayara
                        </td>
                        <td>
                            Miguel
                        </td>
                        <td>
                            Olavo
                        </td>
                    </tr>
                </table>
            </div>
            </center>
        <footer>
        <p>© 2024 Matemágico - Todos os direitos reservados</p>
    </footer>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>