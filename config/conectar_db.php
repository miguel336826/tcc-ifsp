<?php
function conectar_db(){
    $servername = "matemagico-server.mysql.database.azure.com";
    $username = "esscejeuvi";
    $password = "mate_12345";
    $dbname = "db_tcc";
    $port = "3306";
    $connect = mysqli_connect($servername, $username, $password, $dbname, $port);
    if(!$connect){
        die("erro ao conectar a base de dados".mysqli_connect_error());
    }
    return $connect;
}
//fará a conexão com a base de dados
?>