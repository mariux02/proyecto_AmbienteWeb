<?php
include("./config/db.php");

$id = $_POST["id"];

$sql = "DELETE FROM imagenes WHERE ID_VEHICULO = '$id'";
if ($conn->query($sql) === TRUE) {
    $sql2 = "DELETE FROM VEHICULOS WHERE ID_VEHICULO = '$id'";
    if ($conn->query($sql2) === TRUE) {
        echo "exito";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
