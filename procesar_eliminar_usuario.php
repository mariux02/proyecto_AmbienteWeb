<?php
include("./config/db.php");
session_start(); 

$id = intval($_POST["id"]);
echo("$id");
$sql = "DELETE FROM usuarios WHERE ID_USUARIO = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "exito";
} else {
    echo "error";
}

?>