<?php
include "../includes/functions.php";
header("Content-Type: application/json");
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $id_usuario = $_GET["id_usuario"];
    $usuario = buscarUsuario($id_usuario);
}
echo json_encode($usuario);
?>