<?php
include "../includes/functions.php";
header("Content-Type: application/json");
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $id_videoaula = $_GET["id_videoaula"];
    $videoaula = buscarVideoaulaPorId($id_videoaula);
}
echo json_encode($videoaula);
?>