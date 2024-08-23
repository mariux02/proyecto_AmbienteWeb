<?php
include_once '../Views/Layout.php';
include_once '../Controller/UsuarioController.php';
require_once '../Model/ConsultasModel.php';
$usuarios = ConsultaUsuarios();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Usuarios</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link rel="stylesheet" href="../css/styles.css" />
</head>

<body>
    <!-- Section-->
    <section class="py-5">
        <div class="container mt-5">
            <h2>Listado de Usuarios</h2>
            <?php
            if (isset($_GET["msj"])) {
                echo '<div class="alert alert-info TextoCentrado">' . $_GET["msj"] . '</div>';
            }
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo $usuario['Identificacion']; ?></td>
                            <td><?php echo $usuario['Nombre']; ?></td>
                            <td><?php echo $usuario['Email']; ?></td>
                            <td>
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalEditarUsuario<?php echo $usuario['Identificacion']; ?>">Editar</button>
                                <!-- <form action="../Controller/UsuarioController.php" method="post" style="display:inline;">
                                    <input type="hidden" name="id_usuario" value="<?php echo $usuario['Identificacion']; ?>">
                                    <button type="submit" name="btnEliminarUsuario" class="btn btn-danger">Eliminar</button>
                                </form> -->
                            </td>
                        </tr>

                        <div class="modal fade" id="modalEditarUsuario<?php echo $usuario['Identificacion']; ?>"
                            tabindex="-1" aria-labelledby="modalEditarUsuarioLabel<?php echo $usuario['Identificacion']; ?>"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            id="modalEditarUsuarioLabel<?php echo $usuario['Identificacion']; ?>">Editar Usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../Controller/UsuarioController.php" method="post">
                                            <input type="hidden" name="id_usuario"
                                                value="<?php echo $usuario['Identificacion']; ?>" />
                                            <div class="form-group">
                                                <label for="txtIdentificacion<?php echo $usuario['Identificacion']; ?>">Identificación</label>
                                                <input type="text" class="form-control"
                                                    id="txtIdentificacion<?php echo $usuario['Identificacion']; ?>"
                                                    name="txtIdentificacion"
                                                    value="<?php echo $usuario['Identificacion']; ?>" readonly />
                                            </div>
                                            <div class="form-group">
                                                <label for="txtNombre<?php echo $usuario['Identificacion']; ?>">Nombre</label>
                                                <input type="text" class="form-control"
                                                    id="txtNombre<?php echo $usuario['Identificacion']; ?>"
                                                    name="txtNombre" value="<?php echo $usuario['Nombre']; ?>" readonly />
                                            </div>
                                            <div class="form-group">
                                                <label for="txtEmail<?php echo $usuario['Identificacion']; ?>">Email</label>
                                                <input type="email" class="form-control"
                                                    id="txtEmail<?php echo $usuario['Identificacion']; ?>"
                                                    name="txtEmail" value="<?php echo $usuario['Email']; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="txtPassword<?php echo $usuario['Identificacion']; ?>">Password</label>
                                                <input type="password" class="form-control"
                                                    id="txtPassword<?php echo $usuario['Identificacion']; ?>"
                                                    name="txtPassword" />
                                                <small class="form-text text-muted">Deja en blanco si no deseas cambiar la
                                                    contraseña.</small>
                                            </div>
                                            <button type="submit" name="btnEditarUsuario" class="btn btn-primary">Guardar Cambios</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" aria-labelledby="modalAgregarUsuarioLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarUsuarioLabel">Agregar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/UsuarioController.php" method="post">
                        <div class="form-group">
                            <label for="txtIdentificacionNew">Identificación</label>
                            <input type="text" class="form-control" id="txtIdentificacionNew"
                                name="txtIdentificacionNew" onkeyup="BuscarCedula()" required />
                        </div>
                        <div class="form-group">
                            <label for="txtNombreNew">Nombre</label>
                            <input type="text" class="form-control" id="txtNombreNew" name="txtNombreNew" required />
                        </div>
                        <div class="form-group">
                            <label for="txtEmailNew">Email</label>
                            <input type="email" class="form-control" id="txtEmailNew" name="txtEmailNew" required />
                        </div>
                        <div class="form-group">
                            <label for="txtPasswordNew">Password</label>
                            <input type="password" class="form-control" id="txtPasswordNew" name="txtPasswordNew"
                                required />
                        </div>
                        <button type="submit" name="btnAgregarUsuario" id="btnAgregarUsuario"
                            class="btn btn-primary">Agregar Usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once '../Views/Footer.php'; ?>
    <script src="../js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function BuscarCedula() {
            let CEDULA = $("#txtIdentificacionNew").val();
            if (CEDULA.trim().length >= 8) {
                $.ajax({
                    url: "https://apis.gometa.org/cedulas/" + CEDULA,
                    type: "GET",
                    dataType: 'json',
                    success: function (res) {
                        $("#txtNombreNew").val(res.results[0]?.firstname + " " + res.results[0]?.lastname);
                    },
                    error: function (res) {
                        alert("Error" + res);
                    }
                });
            }
        }
    </script>
</body>

</html>
