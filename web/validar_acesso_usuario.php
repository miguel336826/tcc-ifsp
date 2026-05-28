<?php
include "../includes/functions.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $result = false;
    if(isset($_POST["id_usuario"]) and isset($_POST["token_usuario"])){
        $result = validarTokenUsuario($_POST["id_usuario"], $_POST["token_usuario"]);
    }
    if($result){
        $response = ["success" => true, "message" => "token válido"];
    } else{
        $response = ["success" => false, "message" => "token inválido"];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>