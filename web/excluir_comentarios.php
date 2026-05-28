<?php
    include "../includes/functions.php";
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $data = json_decode(file_get_contents("php://input"),true);
        $result = excluirComentarios($data["id_usuario"]);
        if($result){
            $response = ["success" => true, "message" => "Comentários excluídos."];
        }else{
            $response = ["success" => false, "message" => "Comentários não excluídos, tente novamente."];
        }
        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>