<?php
include("./config/db.php");
session_start(); 

$directorio = "uploads/";//aquí se guardan las imágenes de los vehiculos
$marca =  $_POST['marca'];
$modelo =  $_POST['modelo'];
$year =  $_POST['year'];
$precio =  $_POST['precio'];
$descripcion =  $_POST['descripcion'];
$estado =  $_POST['estado'];
$vendedor =  $_POST['vendedor'];
$tel =  $_POST['tel'];

// Verifica si el directorio existe, si no, lo crea
if (!is_dir($directorio)) {
    mkdir($directorio, 0777, true);
}

if($marca == "" || $modelo == "" || $year == "" || $precio == "" || $descripcion == "" || $estado == "" || $vendedor == "" || $tel == ""){
    echo "Campos vacios";
} else {
    $sql = "INSERT INTO VEHICULOS (MARCA, MODELO, AÑO, PRECIO, DESCRIPCION, ESTADO, VENDEDOR, TELEFONO_VENDEDOR) 
            VALUES ('$marca', '$modelo', '$year', '$precio', '$descripcion', '$estado', '$vendedor', '$tel')";

    if($conn->query($sql) === TRUE){
        $id_vehiculo = $conn->insert_id;

        foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
            $nombre_imagen = $_FILES['imagenes']['name'][$key];
            $ruta_imagen = $directorio . basename($nombre_imagen);
        
            if (move_uploaded_file($tmp_name, $ruta_imagen)) {
                $sql = "INSERT INTO imagenes (ruta_imagen, id_vehiculo) VALUES ('$ruta_imagen', $id_vehiculo)";
                if ($conn->query($sql) === TRUE) {
                    echo "Imagen $nombre_imagen subida y registrada correctamente.<br>";
                    header("Location: inventario.php");  
                } else {
                    echo "Error al guardar en la base de datos: " . $conn->error . "<br>";
                }
            } else {
                echo "Error al subir la imagen $nombre_imagen.<br>";
            }
        }
    } else {
        echo "02";
    }
}