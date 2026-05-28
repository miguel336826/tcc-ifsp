<?php
include "../includes/functions.php";
header("Content-Type: application/json");
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $correto = $_GET["resposta_selecionada"];
    $exercicio = verificarRespostaF($correto);
}
echo json_encode($exercicio);
?>