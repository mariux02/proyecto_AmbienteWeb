<?php
include_once '../Model/RegistrarVehiculo.php';

$carpetaSubida = 'C:/xampp/htdocs/Mari/uploads/';

// Función para manejar la carga de archivos
function manejarArchivo($archivo, $carpetaSubida) {
    if ($archivo['error'] === UPLOAD_ERR_OK) {
        $infoImagen = pathinfo($archivo['name']);
        $extensionImagen = strtolower($infoImagen['extension']);
        $nombreImagen = uniqid('img_', true) . '.' . $extensionImagen;
        $rutaImagen = $carpetaSubida . $nombreImagen;
        if (!file_exists($carpetaSubida)) {
            mkdir($carpetaSubida, 0777, true);
        }
        // Validación del tipo de archivo
        $tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($extensionImagen, $tiposPermitidos)) {
            if (move_uploaded_file($archivo['tmp_name'], $rutaImagen)) {
                return $nombreImagen;
            } else {
                return null; 
            }
        } else {
            return null;
        }
    }
    return null; 
}

if (isset($_POST["btnAgregarVehiculo"])) {
    $marca = $_POST['txtMarca'];
    $modelo = $_POST['txtModelo'];
    $año = $_POST['txtAño'];
    $precio = $_POST['txtPrecio'];
    $descripcion = $_POST['txtDescripcion'];
    $estado = $_POST['txtEstado'];
    $vendedor = $_POST['txtVendedor'];
    $telefono_vendedor = $_POST['txtTelefonoVendedor'];

    $nombreImagen = manejarArchivo($_FILES['nombreImagen'], $carpetaSubida);

    if ($nombreImagen === null) {
        header("Location: ../Views/Vehiculos.php?msj=Error+al+cargar+la+imagen");
        exit();
    }

    $resultado = RegistrarVehiculo($marca, $modelo, $año, $precio, $descripcion, $estado, $vendedor, $telefono_vendedor, $nombreImagen);
    if ($resultado) {
        header("Location: ../Views/Vehiculos.php?msj=Vehículo+registrado+correctamente");
    } else {
        header("Location: ../Views/Vehiculos.php?msj=Error+al+registrar+el+vehículo");
    }
    exit();
}

if (isset($_POST["btnEditarVehiculo"])) {
    $id_vehiculo = $_POST['id_vehiculo'];
    $marca = $_POST['txtMarca'];
    $modelo = $_POST['txtModelo'];
    $año = $_POST['txtAño'];
    $precio = $_POST['txtPrecio'];
    $descripcion = $_POST['txtDescripcion'];
    $estado = $_POST['txtEstado'];
    $vendedor = $_POST['txtVendedor'];
    $telefono_vendedor = $_POST['txtTelefonoVendedor'];

    $nombreImagen = null;
    if (isset($_FILES['nombreImagen']) && $_FILES['nombreImagen']['error'] === UPLOAD_ERR_OK) {
        $nombreImagen = manejarArchivo($_FILES['nombreImagen'], $carpetaSubida);
        if ($nombreImagen === null) {
            header("Location: ../Views/Vehiculos.php?msj=Error+al+cargar+la+imagen");
            exit();
        }
    }

    // Llamar a ActualizarVehiculo pasando nombreImagen como NULL si no hay nueva imagen
    $resultado = ActualizarVehiculo($id_vehiculo, $marca, $modelo, $año, $precio, $descripcion, $estado, $vendedor, $telefono_vendedor, $nombreImagen);
    if ($resultado) {
        header("Location: ../Views/Vehiculos.php?msj=Vehículo+actualizado+correctamente");
    } else {
        header("Location: ../Views/Vehiculos.php?msj=Error+al+actualizar+el+vehículo");
    }
    exit();
}



if (isset($_POST["btnEliminarVehiculo"])) {
    $id_vehiculo = $_POST['id_vehiculo'];

    $resultado = EliminarVehiculo($id_vehiculo);
    if ($resultado) {
        header("Location: ../Views/Vehiculos.php?msj=Vehículo+eliminado+correctamente");
    } else {
        header("Location: ../Views/Vehiculos.php?msj=Error+al+eliminar+el+vehículo");
    }
    exit();
}
?>
