<?php
    include "../includes/functions.php";
    header("Content-Type: application/json");
    $formulas = buscaFormulas();
    echo json_encode($formulas);
?>