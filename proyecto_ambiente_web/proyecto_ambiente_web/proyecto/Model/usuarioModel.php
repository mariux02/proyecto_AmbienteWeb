<?php include_once 'baseDatosModel.php';

    function RegistrarUsuario($Identificacion,$Nombre,$Email,$Password)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL RegistrarUsuario('$Identificacion','$Nombre','$Email','$Password')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function IniciarSesion($Email,$Password)
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL IniciarSesion('$Email','$Password')";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ConsultarUsuariosBD()
    {
        $conexion = AbrirBaseDatos();
        $sentencia = "CALL ConsultarUsuarios()";
        $respuesta = $conexion -> query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }

    function ActualizarUsuario($id_usuario, $nombre, $email, $password) {
        $conexion = AbrirBaseDatos();
        // Protege los valores contra inyección SQL
        $id_usuario = mysqli_real_escape_string($conexion, $id_usuario);
        $nombre = mysqli_real_escape_string($conexion, $nombre);
        $email = mysqli_real_escape_string($conexion, $email);
        $password = mysqli_real_escape_string($conexion, $password);
        
        $sentencia = "CALL ActualizarUsuario('$id_usuario', '$nombre', '$email', '$password')";
        $respuesta = $conexion->query($sentencia);
        CerrarBaseDatos($conexion);
        return $respuesta;
    }