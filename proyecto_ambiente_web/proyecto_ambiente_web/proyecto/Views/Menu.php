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
                    echo '<li><a href="Login.php">Iniciar Sesion</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <section class="hero">
        <h1>Encuentra el Auto de tus Sueños</h1>
        <p>Busca, explora, compara y compra vehículos nuevos y usados de manera intuitiva y segura.</p>
        <a href="MenuPrincipal.php" class="cta-button">Comienza Ahora</a>
    </section>

    <section class="features">
        <div class="feature">
            <h2>Buscar Autos</h2>
            <p>Encuentra el auto perfecto utilizando nuestros filtros avanzados de búsqueda.</p>
        </div>
        <div class="feature">
            <h2>Explorar</h2>
            <p>Explora una amplia variedad de vehículos disponibles en nuestro inventario.</p>
        </div>
        <div class="feature">
            <h2>Comparar</h2>
            <p>Compara diferentes modelos y elige el que mejor se adapte a tus necesidades.</p>
        </div>
        <div class="feature">
            <h2>Comprar</h2>
            <p>Compra tu auto de manera segura con nuestra plataforma de pago confiable.</p>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 SC MOTORS. Todos los derechos reservados.</p>
    </footer>
</body>

</html>