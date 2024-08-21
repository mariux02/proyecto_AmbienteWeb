<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SC MOTORS - Venta de Autos</title>
    <link rel="stylesheet" href="./css/styles.css">
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
                <?php if(isset($_SESSION["CORREO"]) && $_SESSION["CORREO"]!="") { ?>
                    <li><a href="inventario.php">Inventario</a></li>
                    <li><a href="logout.php">Salir</a></li>
                <?php } else {?>
                    <li><a href="login.php">Iniciar Sesion</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <main id="mainForm2">
        <section id="sectionForm2">
            <h2>Nuevo Vehículo</h2>
            <form id="formVehiculos"method="post" action="procesar_vehiculos.php" enctype="multipart/form-data">
                <div class="form-column">
                    <label>Marca:</label>
                    <input type="text" name="marca" id="marca" required>

                    <label>Modelo:</label>
                    <input type="text" name="modelo" id="modelo" required>

                    <label>Año:</label>
                    <input type="number" name="year" id="year" required>

                    <label>Precio:</label>
                    <input type="number" name="precio" id="precio" required>

                    <label>Descripción:</label>
                    <input type="text" name="descripcion" id="descripcion" required>
                </div>

                <div class="form-column">
                    <label>Estado:</label>
                    <input type="text" name="estado" id="estado" required>

                    <label>Vendedor:</label>
                    <input type="text" name="vendedor" id="vendedor" required>

                    <label>Número Telefónico del Vendedor:</label>
                    <input type="text" name="tel" id="tel" required>

                    <label>Selecciona imágenes:</label>
                    <input type="file" name="imagenes[]" id="imagenes" multiple>
                    <br>
                    <button type="submit" id="nuevoVehiculo">Ingresar</button>
                </div>

            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 SC MOTORS. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

