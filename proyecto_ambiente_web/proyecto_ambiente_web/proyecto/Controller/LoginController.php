<?php 
    include_once '../Model/usuarioModel.php';
    include_once '../Model/ConsultasModel.php';
   

    if(isset($_POST["btnRegistrarUsuario"]))
    {
        $Identificacion = $_POST["txtIdentificacion"];
        $Nombre = $_POST["txtNombre"];
        $Email = $_POST["txtEmailNew"];
        $Password = $_POST["txtPasswordNew"];
        $respuesta = RegistrarUsuario($Identificacion,$Nombre,$Email,$Password);

        if($respuesta == true)
        {
            header("location: ../Views/login.php");
        }
        else
        {
            $_POST["msj"] = "Su información no se ha registrado correctamente.";
        }
    }

    if(isset($_POST["btnIniciarSesion"]))
    {
        $Email = $_POST["txtEmail"];
        $Password = $_POST["txtPassword"];
        $respuesta = IniciarSesion($Email,$Password);

        if($respuesta -> num_rows > 0)
        {
            $datos = mysqli_fetch_array($respuesta);
            $_SESSION["NombreUsuario"] = $datos["Nombre"];
            $_SESSION["ConsecutivoUsuario"] = $datos["Consecutivo"];
            header("location: ../");
        }
        else
        {
            $_POST["msj"] = "Su información no se ha validado correctamente.";
        }
    }
?>