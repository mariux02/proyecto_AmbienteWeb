<?php
session_start();
include("./config/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUsuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];

    // Actualizar usuario en la base de datos
    $sqlUpdate = "UPDATE USUARIOS 
                  SET NOMBRE = '$nombre', CORREO = '$correo', ROL = '$rol' 
                  WHERE ID_USUARIO = $idUsuario";
    
    if ($conn->query($sqlUpdate) === TRUE) {
        echo json_encode(['success' => 'Usuario actualizado correctamente.']);
        header("Location: Usuarios.php");  
    } else {
        echo json_encode(['error' => 'Error al actualizar el usuario: ' . $conn->error]);
    }
}

$conn->close();
?>
