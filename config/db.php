<?php
$servername = "localhost";
$username ="root";
$password = "Chispa2003";
$database = "AUTOS";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Conexion fallida: ".$conn->connect_error);
}
