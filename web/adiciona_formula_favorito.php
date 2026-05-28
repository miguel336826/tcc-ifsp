<?php
include "../includes/functions.php";
$response = ["success" => false, "message" => "Algo deu errado"];
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id_formula = $_POST["id_formula"];
    $id_usuario = $_POST["id_usuario"];
    AddFormulaFav($id_formula, $id_usuario);
    $response = ["success" => true, "message" => "Adicionado aos favoritos"];
}   
header("Content-Type: application/json");
echo json_encode($response); 
?>