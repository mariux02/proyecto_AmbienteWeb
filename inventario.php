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
                    <li><a href="login.php">Iniciar Sesión</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <main id="mainForm">
        <br>
        <section>
            <br>
            <h2>Inventario de Vehículos</h2>
            <a class="button" id="botonPrimario" href="nuevoVehiculo.php">Agregar</a>
            <table id="inventario">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Precio</th>
                        <th>Vendedor</th>
                        <th>Detalles</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 SC MOTORS. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
