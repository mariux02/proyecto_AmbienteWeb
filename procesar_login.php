<?php
include("./config/db.php");
session_start();
$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];

$sql = "SELECT * FROM usuarios WHERE correo = '$correo'";

$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if(password_verify($contrasena,$row["CONTRASENA"] )){
            $_SESSION["CORREO"] = $row["CORREO"];
            header("Location: index.php");   
        } else {
            echo "$correo";
            echo "$contrasena";
            echo "Usuario o password incorrecto."."<br>";
        }
    }

} else {
    echo "No hay datos que mostrar."."<br>";

}
