<?php
include "../includes/functions.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email_admin = $_POST["email_admin"];
    $senha_admin = $_POST["senha_admin"];

    $admin = checkarLoginAdmin($email_admin, $senha_admin);
    if($admin){
        $response = ["success" => true, "message" => "Login efetuado", "token_admin" => $admin["token_admin"], "id_admin" => $admin["id_admin"], "nome_admin" => $admin["nome_admin"], "sobrenome_admin" => $admin["sobrenome_admin"]];
    } else{
        $response = ["success" => false, "message" => "login não efetuado"];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>