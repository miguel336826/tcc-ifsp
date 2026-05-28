<?php
include "../includes/functions.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $data = json_decode(file_get_contents("php://input"),true);
    $result = editarUsuario($data["id_usuario"], $data["nome_usuario"], $data["sobrenome_usuario"], $data["nascimento_usuario"], $data["email_usuario"]);
    if($result){
        $response = ["success" => true, "message" => "Dados atualizados"];
    } else{
        $response = ["success" => false, "message" => "Erro ao atualizar dados"];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
} else{
    $result = editarUsuario($_GET["id_usuario"], $_GET["nome_usuario"], $_GET["sobrenome_usuario"], $_GET["nascimento_usuario"], $_GET["email_usuario"]);
    if($result){
        $response = ["success" => true, "message" => "Dados atualizados"];
    } else{
        $response = ["success" => false, "message" => "Erro ao atualizar dados"];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>