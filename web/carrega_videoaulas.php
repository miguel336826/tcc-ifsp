<?php
    include "../includes/functions.php";
    header("Content-Type: application/json");
    $videoaulas = buscaVideoaulas();
    echo json_encode($videoaulas);
?>