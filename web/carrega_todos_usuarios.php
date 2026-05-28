<?php
include "../includes/functions.php";
header("Content-Type: application/json");
$usuarios = carregaTodosUsuarios();
echo json_encode($usuarios);
?>