<?php

include "../includes/functions.php";
header("Content-Type: application/json");
$videoaulas = [];
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $txt = $_GET["txt"];
    if(!empty($txt))
        $videoaulas = buscarVideoaulaPorTexto($txt);
}

echo json_encode($videoaulas);

?>