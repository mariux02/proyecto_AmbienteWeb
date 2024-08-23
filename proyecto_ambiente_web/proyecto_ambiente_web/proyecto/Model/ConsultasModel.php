<?php
require_once 'baseDatosModel.php';  

function ConsultasVEHICULOS()
{
    $conexion = AbrirBaseDatos();

    // Construir la sentencia SQL para consultar todos los VEHICULOS
    $sentencia = "SELECT * FROM VEHICULOS";

    // Ejecutar la consulta
    $resultado = $conexion->query($sentencia);

    $VEHICULOS = [];
    if ($resultado->num_rows > 0) {
        while($row = $resultado->fetch_assoc()) {
            $VEHICULOS[] = $row;
        }
    }

    CerrarBaseDatos($conexion);

    return $VEHICULOS   ;
}
function ConsultaUsuarios()
{
    $conexion = AbrirBaseDatos();

    // Construir la sentencia SQL para consultar todos los productos
    $sentencia = "SELECT * FROM usuario";

    // Ejecutar la consulta
    $resultado = $conexion->query($sentencia);

    $usuarios = [];
    if ($resultado->num_rows > 0) {
        while($row = $resultado->fetch_assoc()) {
            $usuarios[] = $row;
        }
    }

    CerrarBaseDatos($conexion);

    return $usuarios;
}
function ConsultaCanjes()
{
    $conexion = AbrirBaseDatos();

    // Construir la sentencia SQL para consultar todos los productos
    $sentencia = "SELECT * FROM canjes";

    // Ejecutar la consulta
    $resultado = $conexion->query($sentencia);

    $canjes = [];
    if ($resultado->num_rows > 0) {
        while($row = $resultado->fetch_assoc()) {
            $canjes[] = $row;
        }
    }

    CerrarBaseDatos($conexion);

    return $canjes;
}
function ConsultaReciclajes()
{
    $conexion = AbrirBaseDatos();

    // Construir la sentencia SQL para consultar todos los productos
    $sentencia = "SELECT * FROM reciclaje";

    // Ejecutar la consulta
    $resultado = $conexion->query($sentencia);

    $reciclaje = [];
    if ($resultado->num_rows > 0) {
        while($row = $resultado->fetch_assoc()) {
            $reciclaje[] = $row;
        }
    }

    CerrarBaseDatos($conexion);

    return $reciclaje;
}

function ConsultaCarritoPuntos()
{
    $conexion = AbrirBaseDatos();

    // Construir la sentencia SQL para consultar todos los productos
    $sentencia = "SELECT * FROM carritopuntos";

    // Ejecutar la consulta
    $resultado = $conexion->query($sentencia);

    $carrito = [];
    if ($resultado->num_rows > 0) {
        while($row = $resultado->fetch_assoc()) {
            $carrito[] = $row;
        }
    }

    CerrarBaseDatos($conexion);

    return $carrito;
}
function ConsultaCarritoPuntosMostrar()
{
    $conexion = AbrirBaseDatos();

    // Construir la sentencia SQL para consultar la vista vistaCarritoPuntos
    $sentencia = "SELECT * FROM vistaCarritoPuntos";

    // Ejecutar la consulta
    $resultado = $conexion->query($sentencia);

    $carrito = [];
    if ($resultado->num_rows > 0) {
        while($row = $resultado->fetch_assoc()) {
            $carrito[] = $row;
        }
    }

    CerrarBaseDatos($conexion);

    return $carrito;
}