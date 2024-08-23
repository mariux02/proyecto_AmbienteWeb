<?php
include_once '../Views/Layout.php';
require_once '../Model/ConsultasModel.php';
$VEHICULOS = ConsultasVEHICULOS();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
</head>

<body>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                foreach ($VEHICULOS as $VEHICULO) {
                ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img src="../uploads/<?php echo $VEHICULO['imagen']; ?>" alt="<?php echo $VEHICULO['marca']; ?>" width="268" height="300" />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?php echo $VEHICULO['marca']; ?></h5>
                                    ₡<?php echo $VEHICULO['precio']; ?>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <button class="btn btn-outline-dark mt-auto" data-bs-toggle="modal" data-bs-target="#modalDetallesProducto<?php echo $producto['id']; ?>">
                                        View options
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalDetallesProducto<?php echo $producto['id']; ?>" tabindex="-1" aria-labelledby="modalDetallesProductoLabel<?php echo $producto['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDetallesProductoLabel<?php echo $producto['id']; ?>"><?php echo $producto['nombre']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="../uploads/<?php echo $producto['imagen']; ?>" class="img-fluid" alt="<?php echo $producto['nombre']; ?>" width="250" height="350">
                                        </div>
                                        <div class="col-md-8">
                                            <h4 class="fw-bold"><?php echo $producto['nombre']; ?></h4>
                                            <p class="text-muted">₡<?php echo $producto['precio_colones']; ?></p>
                                            <p class="text-muted">Puntos: <?php echo $producto['puntos']; ?></p>
                                            <p><?php echo $producto['descripcion']; ?></p>
                                            <p>Cantidad disponible: <?php echo $producto['cantidad_disponible']; ?> unidades</p>
                                            <form action="../Controller/CarritoPuntosController.php" method="post" style="display:inline;">
                                                <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $producto['id']; ?>">
                                                <input type="hidden" name="cantidad" id="cantidad" value=1>
                                                <?php if ($producto['cantidad_disponible'] != 0) { ?>
                                                    <button type="submit" class="btn btn-primary" name="btnAgregarCarrito" id="btnAgregarCarrito">Agregar al Carrito</button>
                                                    <button type="submit" name="btnAgregarCarritoPuntos" id="btnAgregarCarritoPuntos" class="btn btn-primary">Agregar al Carrito Puntos</button>
                                                <?php } ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <?php
    include_once '../Views/Footer.php';
    ?>
    <?php if (isset($_GET['confirmacion'])) { ?>
        <script>
            if (<?php echo isset($_GET['confirmacion']) ? $_GET['confirmacion'] : ''; ?>) {
                alert("<?php echo isset($_GET['msj']) ? $_GET['msj'] : ''; ?>")
            } else {
                alert("<?php echo isset($_GET['msj']) ? $_GET['msj'] : ''; ?>")
            }
            var modalConfirmacion = new bootstrap.Modal(document.getElementById('modalConfirmacion'));
            modalConfirmacion.show();
        </script>
    <?php } ?>
</body>

</html>