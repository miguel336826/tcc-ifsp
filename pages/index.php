<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matemágico | Aprenda matemática</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/css.css">
    <link rel="shortcut icon" href="../icons/favicon.ico" type="image/x-icon">
    <style>
        @keyframes colorChange {
            0%, 100% {
                color: #000;
            }
            50% {
                color: #a30b00;
            }
        }

        #logo-titulo {
            color: #000;
            font-size: 7rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            animation: colorChange 7s infinite;
        }
        #logo-subtitulo {
            color: #000;
            font-size: 3rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
        }
        #imagem {
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            height: auto;
        }
        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            height: 100%;
            background-color: #f8f9fa;
        }
        .btn-dark {
            transition: transform 0.3s ease-in-out;
        }
        .btn-dark:hover {
            transform: rotate(10deg);
        }
    </style>
</head>
<body>

    <!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.2/particles.min.js"></script>
    <script>
        window.onload = function() {
            Particles.init({
                selector: '.background',
                color: '#a80a0f',
                connectParticles: true
            });
        };
    </script>
    -->

    <nav class="navbar navbar-expand-lg fixed-top" id="navegacao">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#"><img src="../icons/favicon.ico" class="me-3"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"><a href="../pages/login_usuario.php" class="btn btn-lg me-3">Entrar</a></li>
                    <li class="nav-item"><a href="../pages/cadastro_usuario.php" class="btn btn-lg me-3">Cadastre-se no Matemágico gratuitamente</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <h1 id="logo-titulo" class="mt-5 mb-5">Matemágico</h1>
                <h3 id="logo-subtitulo" class="mb-5">Seu mais novo método para aprender matemática</h3>
                <a href="../pages/cadastro_usuario.php" class="btn btn-dark">Começe agora</a>
            </div>
            <div class="col-md-6 text-center">
                
            </div>
        </div>
    </div>

    <hr>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <h3 class="mb-3">Contato</h3>
                <p>miguelangelodasilva86@gmail.com</p>
                <p>caccinin@gmail.com</p>
            </div>
            <div class="col-md-4 text-center">
                <h3 class="mb-3">Sobre</h3>
                <p>Esse website faz parte de um projeto que foi criado por três alunos do ensino médio em Araraquara SP</p>
                <a href="../pages/sobre.php" class="link-danger link-offset-2 link-underline link-underline-opacity-0">Saiba mais</a>
            </div>
            <div class="col-md-4 text-center">
                <h3 class="mb-3">O que você encontrará</h3>
                <p>Textos didáticos</p>
                <p>Videoaulas de especialistas</p>
                <p>Exercícios de fixação</p>
                <p>Fórmulas mais usadas</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb8fJb6dA6q7XV2r2z9+F24CecAK/sEK3IoATwjDA2nxDzskx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq3PRhPYjHFL0FaH6zzbrWn5FYLLGqlB5GhjAuG92AIeXxS2Gy" crossorigin="anonymous"></script>

    <!--
    <script src="path/to/particles.min.js"></script>
    -->

</body>
</html>