<?php
session_start();
include("./config/db.php");

if (isset($_GET['id'])) {
    $idVehiculo = $_GET['id'];

    $sql = "SELECT ID_VEHICULO, MARCA, MODELO, AÑO, PRECIO, DESCRIPCION, ESTADO, VENDEDOR, TELEFONO_VENDEDOR 
            FROM VEHICULOS 
            WHERE ID_VEHICULO = $idVehiculo";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $vehiculo = $result->fetch_assoc();

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