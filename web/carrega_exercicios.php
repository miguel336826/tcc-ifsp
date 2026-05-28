<?php
include "../includes/functions.php";
header("Content-Type: application/json");
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $id_assunto = $_GET["id_assunto"];
    $exercicio = buscarExercicioPorId($id_assunto);
}
echo json_encode($exercicio);
?>