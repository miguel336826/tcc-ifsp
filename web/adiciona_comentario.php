<?php
include "../includes/functions.php";
$response = ["success" => false, "message" => "Algo ocorreu errado, tente novamente"];
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $texto_comentario = $_POST["texto_comentario"];
    $id_usuario = $_POST["id_usuario"];
    $id_videoaula = $_POST["id_videoaula"];
    $nome_usuario = $_POST["nome_usuario"];
    $sobrenome_usuario = $_POST["sobrenome_usuario"];
    adicionarComentarioFunctions($texto_comentario, $id_usuario, $id_videoaula, $nome_usuario, $sobrenome_usuario);
    $response = ["success" => true, "message" => "comentário adicionado"];
}   
header("Content-Type: application/json");
echo json_encode($response); 
?>