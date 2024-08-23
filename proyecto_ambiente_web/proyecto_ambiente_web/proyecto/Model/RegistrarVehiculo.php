<?php
require_once 'baseDatosModel.php';  

function RegistrarVehiculo($marca, $modelo, $año, $precio, $descripcion, $estado, $vendedor, $telefono_vendedor, $nombreImagen)
{
    $conexion = AbrirBaseDatos();

    // Sanitizar los datos
    $marca = mysqli_real_escape_string($conexion, $marca);
    $modelo = mysqli_real_escape_string($conexion, $modelo);
    $año = mysqli_real_escape_string($conexion, $año);
    $precio = mysqli_real_escape_string($conexion, $precio);
    $descripcion = mysqli_real_escape_string($conexion, $descripcion);
    $estado = mysqli_real_escape_string($conexion, $estado);
    $vendedor = mysqli_real_escape_string($conexion, $vendedor);
    $telefono_vendedor = mysqli_real_escape_string($conexion, $telefono_vendedor);
    $nombreImagen = mysqli_real_escape_string($conexion, $nombreImagen);

    $sentencia = "CALL InsertarVehiculo('$marca', '$modelo', '$año', '$precio', '$descripcion', '$estado', '$vendedor', '$telefono_vendedor', '$nombreImagen')";

    $resultado = $conexion->query($sentencia);

    CerrarBaseDatos($conexion);

    return $resultado;
}

function ActualizarVehiculo($id_vehiculo, $marca, $modelo, $año, $precio, $descripcion, $estado, $vendedor, $telefono_vendedor, $nombreImagen = null)
{
    $conexion = AbrirBaseDatos();

    // Sanitizar los datos
    $id_vehiculo = mysqli_real_escape_string($conexion, $id_vehiculo);
    $marca = mysqli_real_escape_string($conexion, $marca);
    $modelo = mysqli_real_escape_string($conexion, $modelo);
    $año = mysqli_real_escape_string($conexion, $año);
    $precio = mysqli_real_escape_string($conexion, $precio);
    $descripcion = mysqli_real_escape_string($conexion, $descripcion);
    $estado = mysqli_real_escape_string($conexion, $estado);
    $vendedor = mysqli_real_escape_string($conexion, $vendedor);
    $telefono_vendedor = mysqli_real_escape_string($conexion, $telefono_vendedor);

    // Preparar la sentencia para no actualizar la imagen si no hay una nueva
    if ($nombreImagen === null) {
        $sentencia = "CALL ActualizarVehiculo('$id_vehiculo', '$marca', '$modelo', '$año', '$precio', '$descripcion', '$estado', '$vendedor', '$telefono_vendedor', NULL)";
    } else {
        $nombreImagen = mysqli_real_escape_string($conexion, $nombreImagen);
        $sentencia = "CALL ActualizarVehiculo('$id_vehiculo', '$marca', '$modelo', '$año', '$precio', '$descripcion', '$estado', '$vendedor', '$telefono_vendedor', '$nombreImagen')";
    }

    $resultado = $conexion->query($sentencia);

    CerrarBaseDatos($conexion);

    return $resultado;
}



function EliminarVehiculo($id_vehiculo)
{
    $conexion = AbrirBaseDatos();

    $id_vehiculo = mysqli_real_escape_string($conexion, $id_vehiculo);

    $sentencia = "CALL EliminarVehiculo('$id_vehiculo')";

    $resultado = $conexion->query($sentencia);

    CerrarBaseDatos($conexion);

    return $resultado;
}
?>
