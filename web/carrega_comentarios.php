<?php
include "../includes/functions.php";
header("Content-Type: application/json");
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $id_videoaula = $_GET["id_videoaula"];
    $comentario = buscarComentarioPorId($id_videoaula);
}
echo json_encode($comentario);
?>