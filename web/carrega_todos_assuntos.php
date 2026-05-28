<?php
    include "../includes/functions.php";
    header("Content-Type: application/json");
    $assuntos = buscaAssuntos();
    echo json_encode($assuntos);
?>