<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SC MOTORS - Modificar Vehículo</title>
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
        <section id="vehiculo-detalle">
            <h2>Modificar Detalles del Vehículo</h2>
            <form id="formVehiculos" method="post" action="procesar_modificar_vehiculo.php" enctype="multipart/form-data">
                
                <input type="hidden" name="id_vehiculo" id="id_vehiculo">

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
                    <textarea name="descripcion" id="descripcion" rows="4" cols="50" required></textarea>
                </div>

                <div class="form-column">
                    <label>Estado:</label>
                    <input type="text" name="estado" id="estado" required>

                    <label>Vendedor:</label>
                    <input type="text" name="vendedor" id="vendedor" required>

                    <label>Número Telefónico del Vendedor:</label>
                    <input type="text" name="tel" id="tel" required>

                    <button type="submit" id="actualizaVehiculo">Modificar</button>

                </div>
            </form>
        </section>
        <!--AQUI IRIA EL SECTION DE LAS IMAGENES-->
    </main>
    <footer>
        <p>&copy; 2024 SC MOTORS. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
