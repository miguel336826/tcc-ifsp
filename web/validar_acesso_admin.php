<?php
include "../includes/functions.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $result = false;
    if(isset($_POST["id_admin"]) and isset($_POST["token_admin"])){
        $result = validarTokenAdmin($_POST["id_admin"], $_POST["token_admin"]);
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