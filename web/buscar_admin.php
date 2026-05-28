<?php
include "../includes/functions.php";
header("Content-Type: application/json");
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $id_admin = $_GET["id_admin"];
    $admin = buscarAdmin($id_admin);
}
echo json_encode($admin);
?>