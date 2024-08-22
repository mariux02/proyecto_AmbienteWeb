<?php 
    include("./config/db.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SC MOTORS - Venta de Autos</title>
    <link rel="stylesheet" href="./css/styles.css">
    <script src="./js/jquery-3.7.1.js"></script>
    <script src="./js/script.js"></script>
</head>
<body>
<header>
        <div class="logo">SC MOTORS</div>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="#">Buscar Autos</a></li>
                <li><a href="#">Explorar</a></li>
                <li><a href="#">Comparar</a></li>
                <li><a href="#">Comprar</a></li>
                <li><a href="#">Contacto</a></li>
                <!--Menu de usuarios logueados -->
                <?php 
                    if (isset($_SESSION["CORREO"]) && $_SESSION["CORREO"] != "") {
                        //Menu de administradores
                        if (isset($_SESSION["ROL"]) && $_SESSION["ROL"] == "Administrador") {
                            echo '<li><a href="inventario.php">Inventario</a></li>';
                            echo '<li><a href="Usuarios.php">Usuarios</a></li>';
                        }
                        echo '<li><a href="logout.php">Salir</a></li>';
                    } else {
                        echo '<li><a href="login.php">Iniciar Sesion</a></li>';
                    }
                ?>
            </ul>
        </nav>
    </header>
    <main id="mainForm">
        <section id="sectionForm">
            <h2>Iniciar sesión</h2>
            <form method="post" action="procesar_login.php">
                <label>Correo:</label>
                <input type="email" name="correo" id="correo" required>
                <label>Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" required>
                <button type="submit">Ingresar</button>
                <br>
                <div class="enlace-centro">
                    <a href="nuevoUsuario.php">Regístrate</a>
                </div>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 SC MOTORS. Todos los derechos reservados.</p>
    </footer>
</body>
</html>


