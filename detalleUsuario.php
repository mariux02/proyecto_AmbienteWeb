<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SC MOTORS - Modificar Usuario</title>
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
                <?php 
                    if (isset($_SESSION["CORREO"]) && $_SESSION["CORREO"] != "") {
                        if (isset($_SESSION["ROL"]) && $_SESSION["ROL"] == "Administrador") {
                            echo '<li><a href="inventario.php">Inventario</a></li>';
                        }
                        echo '<li><a href="logout.php">Salir</a></li>';
                    } else {
                        echo '<li><a href="login.php">Iniciar Sesion</a></li>';
                    }
                ?>
            </ul>
        </nav>
    </header>
    <main id="mainForm1">
        <main id="mainForm2">
            <section id="usuario-detalle">
                <h2>Detalles del Usuario</h2>
                <form id="formUsuarios" method="post" action="procesar_modificar_usuario.php">
                    
                    <input type="hidden" name="id_usuario" id="id_usuario">

                    <div class="form-column">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" id="nombre" required>

                        <label>Correo:</label>
                        <input type="email" name="correo" id="correo" required>

                        <label>Rol:</label>
                        <select name="rol" id="rol" required>
                            <option value="Administrador">Administrador</option>
                            <option value="Cliente">Cliente</option>
                        </select>

                        <button type="submit" id="actualizaUsuario">Modificar</button>
                        
                    </div>
                </form>
            </section>
        </main>
    <footer>
        <p>&copy; 2024 SC MOTORS. Todos los derechos reservados.</p>
    </footer>
</body>
</html>