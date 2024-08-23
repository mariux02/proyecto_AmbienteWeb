<?php 
include_once '../Model/UsuarioModel.php';

if (isset($_POST["btnRegistrarUsuario"])) {
    $Identificacion = $_POST["txtIdentificacion"];
    $Nombre = $_POST["txtNombre"];
    $Email = $_POST["txtEmail"];
    $Password = $_POST["txtPassword"];
    $respuesta = RegistrarUsuario($Identificacion, $Nombre, $Email, $Password);

    if ($respuesta) {
        header("location: ../Views/Login.php");
    } else {
        $_POST["msj"] = "Su información no se ha registrado correctamente.";
    }
}

if (isset($_POST["btnIniciarSesion"])) {
    $Email = $_POST["txtEmail"];
    $Password = $_POST["txtPassword"];
    $respuesta = IniciarSesion($Email, $Password);

    if ($respuesta->num_rows > 0) {
        $datos = mysqli_fetch_array($respuesta);
        $_SESSION["NombreUsuario"] = $datos["Nombre"];
        header("location: ../View/home.php");
    } else {
        $_POST["msj"] = "Su información no se ha validado correctamente.";
    }
}

if (isset($_POST["btnEditarUsuario"])) {
    $id_usuario = $_POST["id_usuario"];
    $nombre = $_POST["txtNombre"];
    $email = $_POST["txtEmail"];
    $password = $_POST["txtPassword"];
    $respuesta = ActualizarUsuario($id_usuario, $nombre, $email, $password);

    if ($respuesta) {
        header("location: ../Views/Usuario.php?msj=Usuario actualizado con éxito.");
    } else {
        header("location: ../Views/Usuario.php?msj=Error al actualizar el usuario.");
    }
}

function ConsultarUsuarios() {
    $respuesta = ConsultarUsuariosBD();

    if ($respuesta->num_rows > 0) {
        while ($row = mysqli_fetch_array($respuesta)) { 
            echo "<tr>";
            echo "<td>" . $row["Identificacion"] . "</td>";
            echo "<td>" . $row["Nombre"] . "</td>";
            echo "<td>" . $row["Correo"] . "</td>";
            echo "<td>" . $row["NombreRol"] . "</td>";
            echo "</tr>";
        }
    }
}
