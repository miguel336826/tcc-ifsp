<?php
include "../includes/functions.php";
$response = ["success" => false, "message" => "Cadastro não efetuado, tente novamente"];
if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $nome_admin = $_POST["nome_admin"];
    $sobrenome_admin = $_POST["sobrenome_admin"];
    $nascimento_admin = $_POST["nascimento_admin"];
    $email_admin = $_POST["email_admin"];
    $senha_admin = $_POST["senha_admin"];
    cadastroAdmin($nome_admin, $sobrenome_admin, $nascimento_admin, $senha_admin, $email_admin);
    $response = ["success" => true, "message" => "Cadastro efetuado"];
}
header("Content-Type: application/json");
echo json_encode($response);
?>