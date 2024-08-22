<?php
include("./config/db.php");
session_start(); 

$marca =  $_POST['marca'];
$modelo =  $_POST['modelo'];
$year =  $_POST['year'];
$precio =  $_POST['precio'];
$descripcion =  $_POST['descripcion'];
$estado =  $_POST['estado'];
$vendedor =  $_POST['vendedor'];
$tel =  $_POST['tel'];
$id_vehiculo = $_POST['id_vehiculo'];

if($marca == "" || $modelo == "" || $year == "" || $precio == "" || $descripcion == "" || $estado == "" || $vendedor == "" || $tel == "" || $id_vehiculo == ""){
    echo "Campos vacios";
} else {
    $sql = "UPDATE VEHICULOS 
            SET MARCA = '$marca', MODELO = '$modelo', AÑO = '$year', PRECIO = '$precio', DESCRIPCION = '$descripcion', ESTADO = '$estado', VENDEDOR = '$vendedor', TELEFONO_VENDEDOR = '$tel' 
            WHERE ID_VEHICULO = $id_vehiculo";

    if($conn->query($sql) === TRUE){
        echo "Actualizado";
        header("Location: inventario.php");  
    } else {
        echo "Error: " . $conn->error;
    }
}
