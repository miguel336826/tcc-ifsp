<?php
    include "../includes/functions.php";
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $data = json_decode(file_get_contents("php://input"),true);
        $result = excluirUsuario($data["id_usuario"]);
        if($result){
            $response = ["success" => true, "message" => "Usuário removido"];
        }else{
            $response = ["success" => false, "message" => "Usuário não removido"];
        }
        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>