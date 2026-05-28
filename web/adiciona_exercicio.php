<?php
include "../includes/functions.php";
$response = ["success" => false, "message" => "Algo ocorreu errado, tente novamente"];
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $enunciado = $_POST["enunciado"];
    $comando = $_POST["comando"];
    $alt_a = $_POST["alt_a"];
    $alt_b = $_POST["alt_b"];
    $alt_c = $_POST["alt_c"];
    $alt_d = $_POST["alt_d"];
    $alt_e = $_POST["alt_e"];
    $correto = $_POST["correto"];
    $explicacao = $_POST["explicacao"];
    $id_assunto = $_POST["id_assunto"];
    adicionarExercicioF($enunciado, $comando, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $correto, $explicacao, $id_assunto);
    $response = ["success" => true, "message" => "Exercício adicionado"];
}   
header("Content-Type: application/json");
echo json_encode($response); 
?>