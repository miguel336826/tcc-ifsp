<?php
    include "../includes/functions.php";
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $data = json_decode(file_get_contents("php://input"),true);
        $result = removeVideoaulaFavorito($data["id_videoaula"]);
        if($result){
            $response = ["success" => true, "message" => "Removido"];
        }else{
            $response = ["success" => false, "message" => "Algo deu errado"];
        }
        header("Content-Type: application/json");
        echo json_encode($response);
    }
?>