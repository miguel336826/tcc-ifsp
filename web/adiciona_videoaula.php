<?php
include "../includes/functions.php";
$response = ["success" => false, "message" => "Algo ocorreu errado, tente novamente"];
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $titulo_va = $_POST["titulo_va"];
    $descricao = $_POST["descricao"];
    $link = $_POST["link"];
    adicionarVideoaulaF($titulo_va, $descricao, $link);
    $response = ["success" => true, "message" => "Videoaula adicionada"];
}   
header("Content-Type: application/json");
echo json_encode($response); 
?>