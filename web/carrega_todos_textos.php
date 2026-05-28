<?php
    include "../includes/functions.php";
    header("Content-Type: application/json");
    $textos = buscaTextos();
    echo json_encode($textos);
?>