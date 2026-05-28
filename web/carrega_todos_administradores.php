<?php
include "../includes/functions.php";
header("Content-Type: application/json");
$admins = carregaTodosAdministradores();
echo json_encode($admins);
?>