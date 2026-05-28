<?php
include "../includes/functions.php";

$response = ["success" => false, "message" => "Cadastro não efetuado, tente novamente"];
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email_usuario = $_POST["email_usuario"];
    $senha_usuario = $_POST["senha_usuario"];
    if(verEmailSenhaUsu($email_usuario, $senha_usuario)){
        $response = ["success" => false, "message" => "Email ou senha já existem"];
    } else{
        $nome_usuario = $_POST["nome_usuario"];
        $sobrenome_usuario = $_POST["sobrenome_usuario"];
        $nascimento_usuario = $_POST["nascimento_usuario"];
        $email_usuario = $_POST["email_usuario"];
        $senha_usuario = $_POST["senha_usuario"];
        cadastroUsuario($nome_usuario, $sobrenome_usuario, $nascimento_usuario, $senha_usuario, $email_usuario);
        $response = ["success" => true, "message" => "Cadastro efetuado"];
    }
    header("Content-Type: application/json");
    echo json_encode($response);
}    
?>