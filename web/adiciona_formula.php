<?php
include "../includes/functions.php";
$response = ["success" => false, "message" => "Algo ocorreu errado, tente novamente"];
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $titulo_fo = $_POST["titulo_fo"];
    $materia = $_POST["materia"];
    $expressao = $_POST["expressao"];
    adicionarFormulaFunctions($titulo_fo, $materia, $expressao);
    $response = ["success" => true, "message" => "fórmula adicionada"];
}   
header("Content-Type: application/json");
echo json_encode($response); 
?>