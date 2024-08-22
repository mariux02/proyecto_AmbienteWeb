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

            //Datos del usuario logueado
            $_SESSION["CORREO"] = $row["CORREO"];
            $_SESSION["NOMBRE"] = $row["NOMBRE"];
            $_SESSION["ROL"] = $row["ROL"];
            $_SESSION["ID_USUARIO"] = $row["ID_USUARIO"];
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
