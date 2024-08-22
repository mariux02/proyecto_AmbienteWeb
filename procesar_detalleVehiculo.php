<?php
session_start();
include("./config/db.php");

if (isset($_GET['id'])) {
    $idVehiculo = $_GET['id'];

    // Consulta para obtener los detalles del vehículo
    $sqlVehiculo = "SELECT ID_VEHICULO, MARCA, MODELO, AÑO, PRECIO, DESCRIPCION, ESTADO, VENDEDOR, TELEFONO_VENDEDOR 
                    FROM VEHICULOS 
                    WHERE ID_VEHICULO = $idVehiculo";
    $resultVehiculo = $conn->query($sqlVehiculo);

    // Consulta para obtener las imágenes del vehículo
    $sqlImagenes = "SELECT ruta_imagen FROM imagenes WHERE id_vehiculo = $idVehiculo";
    $resultImagenes = $conn->query($sqlImagenes);

    if ($resultVehiculo->num_rows > 0) {
        $vehiculo = $resultVehiculo->fetch_assoc();
        $vehiculo['imagenes'] = [];

        if ($resultImagenes->num_rows > 0) {
            while ($row = $resultImagenes->fetch_assoc()) {
                $vehiculo['imagenes'][] = $row['ruta_imagen'];
            }
        }

        header('Content-Type: application/json');
        echo json_encode($vehiculo);
    } else {
        header('Content-Type: application/json');
        echo json_encode(null);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'ID de vehículo no especificado.']);
}

$conn->close();
?>
