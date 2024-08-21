<?php
include("./config/db.php");

$sql = "SELECT ID_VEHICULO, MARCA, MODELO, AÑO, PRECIO, VENDEDOR FROM vehiculos";
$result = $conn->query($sql);

$inventario = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $inventario[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($inventario);
?>
