<?php
include_once '../Views/Layout.php';
include_once '../Controller/VehiculoController.php';
require_once '../Model/ConsultasModel.php';

// Obtener los vehículos de la base de datos
$vehiculos = ConsultasVEHICULOS();

// Mostrar el contenido de $vehiculos para depuración
echo '<pre>';
print_r($vehiculos);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Vehículos</title>
    <link rel="stylesheet" href="../dist/css/style.css">
    <!-- Agrega aquí otros enlaces de estilo o scripts necesarios -->
</head>

<body>
    <!-- Section-->
    <section class="py-5">
        <div class="container mt-5">
            <h2>Lista de Vehículos</h2>
            <?php
            if (isset($_GET["msj"])) {
                echo '<div class="alert alert-info TextoCentrado">' . htmlspecialchars($_GET["msj"]) . '</div>';
            }
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Vendedor</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vehiculos as $vehiculo): ?>
                        <tr>
                            <td>
                                <?php if (isset($vehiculo['imagen']) && $vehiculo['imagen']): ?>
                                    <img src="../uploads/<?php echo htmlspecialchars($vehiculo['imagen']); ?>" alt="Imagen del vehículo" width="50">
                                <?php else: ?>
                                    <img src="../uploads/default.png" alt="Imagen predeterminada" width="50">
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($vehiculo['marca'] ?? 'No disponible'); ?></td>
                            <td><?php echo htmlspecialchars($vehiculo['modelo'] ?? 'No disponible'); ?></td>
                            <td><?php echo htmlspecialchars($vehiculo['año'] ?? 'No disponible'); ?></td>
                            <td><?php echo htmlspecialchars($vehiculo['precio'] ?? 'No disponible'); ?></td>
                            <td><?php echo htmlspecialchars($vehiculo['descripcion'] ?? 'No disponible'); ?></td>
                            <td><?php echo htmlspecialchars($vehiculo['estado'] ?? 'No disponible'); ?></td>
                            <td><?php echo htmlspecialchars($vehiculo['vendedor'] ?? 'No disponible'); ?></td>
                            <td><?php echo htmlspecialchars($vehiculo['telefono_vendedor'] ?? 'No disponible'); ?></td>
                            <td>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarVehiculo<?php echo htmlspecialchars($vehiculo['id_vehiculo']); ?>">Editar</button>
                                <form action="../Controller/VehiculoController.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id_vehiculo" value="<?php echo htmlspecialchars($vehiculo['id_vehiculo']); ?>">
                                    <button type="submit" name="btnEliminarVehiculo" id="btnEliminarVehiculo" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal para editar vehículo -->
                        <div class="modal fade" id="modalEditarVehiculo<?php echo htmlspecialchars($vehiculo['id_vehiculo']); ?>" tabindex="-1" aria-labelledby="modalEditarVehiculoLabel<?php echo htmlspecialchars($vehiculo['id_vehiculo']); ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditarVehiculoLabel<?php echo htmlspecialchars($vehiculo['id_vehiculo']); ?>">Editar Vehículo</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../Controller/VehiculoController.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id_vehiculo" value="<?php echo htmlspecialchars($vehiculo['id_vehiculo']); ?>">
                                            <div class="form-group">
                                                <label for="txtMarca">Marca</label>
                                                <input type="text" class="form-control" id="txtMarca" name="txtMarca" value="<?php echo htmlspecialchars($vehiculo['marca']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtModelo">Modelo</label>
                                                <input type="text" class="form-control" id="txtModelo" name="txtModelo" value="<?php echo htmlspecialchars($vehiculo['modelo']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtAño">Año</label>
                                                <input type="number" class="form-control" id="txtAño" name="txtAño" value="<?php echo htmlspecialchars($vehiculo['año']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtPrecio">Precio</label>
                                                <input type="number" class="form-control" id="txtPrecio" name="txtPrecio" value="<?php echo htmlspecialchars($vehiculo['precio']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtDescripcion">Descripción</label>
                                                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="3" required><?php echo htmlspecialchars($vehiculo['descripcion']); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtEstado">Estado</label>
                                                <input type="text" class="form-control" id="txtEstado" name="txtEstado" value="<?php echo htmlspecialchars($vehiculo['estado']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtVendedor">Vendedor</label>
                                                <input type="text" class="form-control" id="txtVendedor" name="txtVendedor" value="<?php echo htmlspecialchars($vehiculo['vendedor']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtTelefonoVendedor">Teléfono del Vendedor</label>
                                                <input type="text" class="form-control" id="txtTelefonoVendedor" name="txtTelefonoVendedor" value="<?php echo htmlspecialchars($vehiculo['telefono_vendedor']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="imagen">Imagen del Vehículo</label>
                                                <input type="file" class="form-control-file" id="nombreImagen" name="nombreImagen">
                                            </div>
                                            <button type="submit" name="btnEditarVehiculo" id="btnEditarVehiculo" class="btn btn-primary">Guardar Cambios</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarVehiculo">Agregar Vehículo</button>
        </div>
    </section>

    <!-- Modal para agregar vehículo -->
    <div class="modal fade" id="modalAgregarVehiculo" tabindex="-1" aria-labelledby="modalAgregarVehiculoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarVehiculoLabel">Agregar Vehículo</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/VehiculoController.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="txtMarca">Marca</label>
                            <input type="text" class="form-control" id="txtMarca" name="txtMarca" required>
                        </div>
                        <div class="form-group">
                            <label for="txtModelo">Modelo</label>
                            <input type="text" class="form-control" id="txtModelo" name="txtModelo" required>
                        </div>
                        <div class="form-group">
                            <label for="txtAño">Año</label>
                            <input type="number" class="form-control" id="txtAño" name="txtAño" required>
                        </div>
                        <div class="form-group">
                            <label for="txtPrecio">Precio</label>
                            <input type="number" class="form-control" id="txtPrecio" name="txtPrecio" required>
                        </div>
                        <div class="form-group">
                            <label for="txtDescripcion">Descripción</label>
                            <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="txtEstado">Estado</label>
                            <input type="text" class="form-control" id="txtEstado" name="txtEstado" required>
                        </div>
                        <div class="form-group">
                            <label for="txtVendedor">Vendedor</label>
                            <input type="text" class="form-control" id="txtVendedor" name="txtVendedor" required>
                        </div>
                        <div class="form-group">
                            <label for="txtTelefonoVendedor">Teléfono del Vendedor</label>
                            <input type="text" class="form-control" id="txtTelefonoVendedor" name="txtTelefonoVendedor" required>
                        </div>
                        <div class="form-group">
                            <label for="nombreImagen">Imagen del Vehículo</label>
                            <input type="file" class="form-control-file" id="nombreImagen" name="nombreImagen">
                        </div>
                        <button type="submit" name="btnAgregarVehiculo" id="btnAgregarVehiculo" class="btn btn-success">Agregar Vehículo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../dist/js/bootstrap.bundle.min.js"></script>
    <!-- Agrega aquí otros scripts necesarios -->
</body>

</html>
