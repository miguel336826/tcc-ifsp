<?php
include "../includes/functions.php";
$response = ["success" => false, "message" => "Algo ocorreu errado, tente novamente"];
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $assunto = $_POST["assunto"];
    adicionarAssuntoVideoaulaFunctions($assunto);
    $response = ["success" => true, "message" => "adicionado"];
}   
header("Content-Type: application/json");
echo json_encode($response); 
?>