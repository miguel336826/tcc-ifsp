<?php
include "../includes/functions.php";

header("Content-Type: application/json");
if($_SERVER["REQUEST_METHOD"] === "GET"){

    $token_usuario = $_GET["token_usuario"];
    $usuario = buscarTokenUsuario($token_usuario);

}
echo json_encode($usuario);
?>