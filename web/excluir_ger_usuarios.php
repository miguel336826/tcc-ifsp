<?php
include "../includes/functions.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $data = json_decode(file_get_contents("php://input"),true);
    $result = excluirGerUsuario($data["id_usuario"]);
    if($result){
        $response = ["success" => true, "message" => "Exclusão concluída"];
    } else{
        $response = ["success" => false, "message" => "Exclusão incompleta, algo ocorreu errado"];
    }
    header("Content-Type: application/json");
    echo json_encode($response);
}
?>