<?php
include "../includes/functions.php";
$response = ["success" => false, "message" => "Algo deu errado"];
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id_videoaula = $_POST["id_videoaula"];
    $id_usuario = $_POST["id_usuario"];
    AddVideoaulaFav($id_videoaula, $id_usuario);
    $response = ["success" => true, "message" => "Adicionado aos favoritos"];
}   
header("Content-Type: application/json");
echo json_encode($response); 
?>