<?php
include "../includes/functions.php";
$response = ["success" => false, "message" => "Algo deu errado"];
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $data = json_decode(file_get_contents('php://input'), true);
    if(isset($data["arrayDosIds"]) && is_array($data["arrayDosIds"])){
        $arrayDosIds = $data["arrayDosIds"];
        $formulas = buscarTodosFormulasFavoritos($arrayDosIds);
        if($formulas) {
            $response = ["success" => true, "data" => $formulas];
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