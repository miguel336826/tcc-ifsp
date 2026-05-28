<?php
include "../includes/functions.php";

header("Content-Type: application/json");
if($_SERVER["REQUEST_METHOD"] === "GET"){

    $token_admin = $_GET["token_administrador"];
    $administrador = buscarTokenAdministrador($token_admin);

}
echo json_encode($administrador);
?>