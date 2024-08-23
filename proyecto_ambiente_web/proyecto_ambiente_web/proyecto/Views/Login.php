<?php
include_once '../Controller/LoginController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Iniciar Sesion | Registrase</title>
    <link rel="stylesheet" href="../../css/login.css" />

    
</head>

<body>
    <br>
    <br>
    <div class="cont">
        <div class="form sign-in">
            <h2>Bienvenido</h2>
            <?php
            if (isset($_POST["msj"])) {
                echo '<div class="alert alert-info TextoCentrado">' . $_POST["msj"] . '</div>';
            }
            ?>
            <form action="" method="post">
                <label>
                    <span>Correo</span>
                    <input type="email" id="txtEmail" name="txtEmail" />
                </label>
                <label>
                    <span>Contraseña</span>
                    <input type="password" id="txtPassword" name="txtPassword" />
                </label>
                <button type="submit" class="submit" id="btnIniciarSesion" name="btnIniciarSesion">Iniciar sesion</button>
            </form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">

                    <h3>No tiene cuenta? Por favor registrese!<h3>
                </div>
                <div class="img__text m--in">

                    <h3>Si ya tiene cuenta, Inicie sesion.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Registrase</span>
                    <span class="m--in">Iniciar Sesion </span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Crear Cuenta</h2>
                <?php
                if (isset($_POST["msj"])) {
                    echo '<div class="alert alert-info TextoCentrado">' . $_POST["msj"] . '</div>';
                }
                ?>
                <form action="" method="post">
                <label>
                        <span>Identificacion</span>
                        <input type="text" id="txtIdentificacion" name="txtIdentificacion" onkeyup="BuscarCedula()"/>
                    </label>
                    <label>
                        <span>Nombre</span>
                        <input type="text" id="txtNombre" name="txtNombre" />
                    </label>
                    <label>
                        <span>Correo</span>
                        <input type="email" id="txtEmailNew" name="txtEmailNew" />
                    </label>
                    <label>
                        <span>Contraseña</span>
                        <input type="password" id="txtPasswordNew" name="txtPasswordNew" />
                    </label>
                    <button type="submit" class="submit" id="btnRegistrarUsuario" name="btnRegistrarUsuario">Registrase</button>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });

        function BuscarCedula() {
            let CEDULA = $("#txtIdentificacion").val();
            if (CEDULA.trim().length >= 8) {
                $.ajax({
                    url: "https://apis.gometa.org/cedulas/" + CEDULA,
                    type: "GET",
                    dataType: 'json',
                    success: function(res) {
                        $("#txtNombre").val(res.results[0]?.firstname + " " + res.results[0]?.lastname);
                    },
                    Error: function(res) {
                        alert("Error" + res);
                    }
                });
            }
        };
    </script>
</body>
</html>