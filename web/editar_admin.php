<?php
include "../includes/functions.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $data = json_decode(file_get_contents("php://input"),true);
    $result = editarAdmin($data["id_admin"], $data["nome_admin"], $data["sobrenome_admin"], $data["nascimento_admin"], $data["email_admin"]);
    if($result){
        $response = ["success" => true, "message" => "Dados atualizados"];
    } else{
        $response = ["success" => false, "message" => "Erro ao atualizar dados"];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
} else{
    $result = editarAdmin($_GET["id_admin"], $_GET["nome_admin"], $_GET["sobrenome_admin"], $_GET["nascimento_admin"], $_GET["email_admin"]);
    if($result){
        $response = ["success" => true, "message" => "Dados atualizados"];
    } else{
        $response = ["success" => false, "message" => "Erro ao atualizar dados"];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>