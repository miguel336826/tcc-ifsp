<?php
include "../includes/functions.php";
header("Content-Type: application/json");
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $id_texto = $_GET["id_texto"];
    $texto = buscarTextoPorId($id_texto);
}
echo json_encode($texto);
?>