<?php
session_start();
include("./config/db.php");

if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];

    // Consulta para obtener los detalles del usuario
    $sqlUsuario = "SELECT ID_USUARIO, NOMBRE, CORREO, ROL 
                   FROM USUARIOS 
                   WHERE ID_USUARIO = $idUsuario";
    $resultUsuario = $conn->query($sqlUsuario);

    if ($resultUsuario->num_rows > 0) {
        $usuario = $resultUsuario->fetch_assoc();

        header('Content-Type: application/json');
        echo json_encode($usuario);
    } else {
        header('Content-Type: application/json');
        echo json_encode(null);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'ID de usuario no especificado.']);
}

$conn->close();
?>