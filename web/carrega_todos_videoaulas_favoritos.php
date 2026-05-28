<?php
include "../includes/functions.php";
$response = ["success" => false, "message" => "Algo deu errado"];
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $data = json_decode(file_get_contents('php://input'), true);
    if(isset($data["arrayDosIds"]) && is_array($data["arrayDosIds"])){
        $arrayDosIds = $data["arrayDosIds"];
        $textos = buscarTodosVideoaulasFavoritos($arrayDosIds);
        if($textos) {
            $response = ["success" => true, "data" => $textos];
        } else {
            $response["message"] = "Algo deu errado";
        }
    } else {
        $response["message"] = "Algo deu errado";
    }
}   
header("Content-Type: application/json");
echo json_encode($response); 
?>