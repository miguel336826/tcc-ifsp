<?php
include "../includes/functions.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email_usuario = $_POST["email_usuario"];
    $senha_usuario = $_POST["senha_usuario"];

    $usuario = checkarLoginUsuario($email_usuario, $senha_usuario);
    if($usuario){
        $response = ["success" => true, "message" => "Login efetuado", "token_usuario" => $usuario["token_usuario"], "id_usuario" => $usuario["id_usuario"], "nome_usuario" => $usuario["nome_usuario"], "sobrenome_usuario" => $usuario["sobrenome_usuario"]];
    } else{
        $response = ["success" => false, "message" => "login não efetuado"];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>