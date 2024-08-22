<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Imágenes del Vehículo</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
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
<body>
    <header>
        <h2>Buscar Imágenes del Vehículo</h2>
    </header>
    <main>
        <section>
            <form method="post" action="ver_imagenes.php">
                <label for="id_vehiculo">ID del Vehículo:</label>
                <input type="number" name="id_vehiculo" id="id_vehiculo" required>
                <button type="submit">Ver Imágenes</button>
            </form>
        </section>
        
        <section id="imagenes-vehiculo">
            <h2>Imágenes del Vehículo</h2>
            <!-- Aquí se mostrarán las imágenes -->
            <?php
            if (isset($_POST['id_vehiculo'])) {
                include("./config/db.php");

                $id_vehiculo = $_POST['id_vehiculo'];

                // Consulta para obtener las imágenes del vehículo
                $sql = "SELECT ruta_imagen FROM imagenes WHERE id_vehiculo = $id_vehiculo";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Iterar sobre cada imagen y mostrarla
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='imagen-vehiculo'>";
                        echo "<img src='" . $row['ruta_imagen'] . "' alt='Imagen del vehículo' style='width:200px; height:auto;'><br>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No se encontraron imágenes para el vehículo con ID $id_vehiculo.</p>";
                }

                // Cerrar la conexión
                $conn->close();
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 SC MOTORS. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
