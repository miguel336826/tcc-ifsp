<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Início | Matemágico</title>
    <link rel="stylesheet" href="../assets/css/css.css">
    <link rel="shortcut icon" href="../icons/favicon.ico" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top mb-5" id="navegacao">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="../pages/home.php"><img src="../icons/favicon.ico" class="me-3"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mt-1"><input type="search" name="pesquisa" id="pesquisa" class="form-control rounded-5" placeholder="Pesquisar" style="border: groove 1px;"></li>
                    <li class="nav-item"><a href="home.php" class="btn btn-lg me-3">Início</a></li>
                    <li class="nav-item"><a href="textos.php" class="btn btn-lg me-3">Textos</a></li>
                    <li class="nav-item"><a href="videoaulas.php" class="btn btn-lg me-3">Videoaulas</a></li>
                    <li class="nav-item"><a href="exercicios.php" class="btn btn-lg me-3">Exercícios</a></li>
                    <li class="nav-item"><a href="formulas.php" class="btn btn-lg me-3">Fórmulas</a></li>
                    <li class="nav-item dropdown mt-1">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Favoritos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="textos_favoritos.php">Textos</a></li>
                            <li><a class="dropdown-item" href="videoaulas_favoritos.php">Videoaulas</a></li>
                            <li><a class="dropdown-item" href="formulas_favoritos.php">Fórmulas</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"><a href="perfil.php" class="btn btn-lg me-3">Minha conta</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <ul id="resultados" class="list-group mt-5 mb-5 ms-5 me-5 col-2"></ul>

    <script src="../assets/javascripts/scripts_pesquisa.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
