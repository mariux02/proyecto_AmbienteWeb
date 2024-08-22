<?php
include("./config/db.php");
session_start(); 

$sql = "SELECT ID_USUARIO, NOMBRE, CORREO, ROL FROM usuarios";
$result = $conn->query($sql);

$usuarios = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($usuarios);
?>
