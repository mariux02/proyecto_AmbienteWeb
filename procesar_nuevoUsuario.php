<?php
include("./config/db.php");
session_start(); 

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$rol = isset($_POST['rol']) ? $_POST['rol'] : 'Cliente'; // Asume 'Cliente' si el rol es nulo

if ($nombre == "" || $correo == "" || $contrasena == "") {
    echo "Campos vacíos";
} else {
    // Hash de la contraseña
    $hash_contrasena = password_hash($contrasena, PASSWORD_BCRYPT);

    $sql = "INSERT INTO USUARIOS (NOMBRE, CORREO, CONTRASENA, ROL) VALUES ('$nombre', '$correo', '$hash_contrasena', '$rol')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario registrado correctamente.";
        if (isset($_SESSION["ROL"]) && $_SESSION["ROL"] == "Administrador") {
            header("Location: usuarios.php");
        } else {
            header("Location: login.php");
        }   
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
}
?>
