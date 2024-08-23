$(document).ready(function() {
    cargarInventario();
    cargarUsuarios();

    function cargarInventario() {
        $.ajax({
            url: 'procesar_inventario.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var rows = '';
                data.forEach(function(i) {
                    rows += '<tr>';
                    rows += '<td>' + i.id_vehiculo + '</td>';
                    rows += '<td>' + i.marca + '</td>';
                    rows += '<td>' + i.modelo + '</td>';
                    rows += '<td>' + i.año + '</td>';
                    rows += '<td>$' + i.precio + '</td>';
                    rows += '<td>' + i.vendedor + '</td>';
                    rows += '<td><a class="button" href="detalleVehiculo.php?id=' + i.id_vehiculo + '">Detalles</a></td>';
                    rows += '<td><button class="button" onclick="eliminarVehiculo(' + i.id_vehiculo + ')">Eliminar</button></td>';
                    rows += '</tr>';
                });
                $('#inventario tbody').html(rows);
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar inventario: " + error);
            }
        });
    }

    function cargarUsuarios() {
        $.ajax({
            url: 'procesar_usuarios.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var rows = '';
                data.forEach(function(u) {
                    rows += '<tr>';
                    rows += '<td>' + u.id_usuario + '</td>';
                    rows += '<td>' + u.nombre + '</td>';
                    rows += '<td>' + u.correo + '</td>';
                    rows += '<td>' + u.rol + '</td>';
                    rows += '<td><a class="button" href="detalleUsuario.php?id=' + u.id_usuario + '">Detalles</a></td>';
                    rows += '<td><button class="button" onclick="eliminarUsuario(' + u.id_usuario + ')">Eliminar</button></td>';
                    rows += '</tr>';
                });
                $('#usuarios tbody').html(rows);
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar los usuarios: " + error);
            }
        });
    }

    function eliminarVehiculo(vehiculoID) {
        if (confirm('¿Estás seguro de que deseas eliminar este vehículo?')) {
            $.ajax({
                url: 'procesar_eliminar_vehiculo.php',
                type: 'POST',
                data: { id: vehiculoID },
                success: function(response) {
                    alert('Vehículo eliminado exitosamente.');
                    cargarInventario();
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }
    }

    function eliminarUsuario(usuarioID) {
        if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
            $.ajax({
                url: 'procesar_eliminar_usuario.php',
                type: 'POST',
                data: { id: usuarioID },
                success: function(response) {
                    alert('Usuario eliminado exitosamente.');
                    cargarUsuarios();
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }
    }

    // Cargar detalles del vehículo y usuario si el parámetro ID está presente
    var urlParams = new URLSearchParams(window.location.search);
    var vehiculoId = urlParams.get('id');
    var usuarioId = urlParams.get('id');

    if (vehiculoId) {
        $.ajax({
            url: 'procesar_detalleVehiculo.php',
            type: 'GET',
            data: { id: vehiculoId },
            dataType: 'json',
            success: function(data) {
                if (data) {
                    $('#id_vehiculo').val(data.id_vehiculo);
                    $('#marca').val(data.marca);
                    $('#modelo').val(data.modelo);
                    $('#año').val(data.año);
                    $('#precio').val(data.precio);
                    $('#descripcion').val(data.descripcion);
                    $('#estado').val(data.estado);
                    $('#vendedor').val(data.vendedor);
                    $('#telefono_vendedor').val(data.telefono_vendedor);

                    var imagenesContainer = $('#imagenes-vehiculo');
                    imagenesContainer.empty();
                    if (data.imagenes.length > 0) {
                        data.imagenes.forEach(function(imagen) {
                            var imgElement = $('<img>').attr('src', imagen).attr('alt', 'Imagen del vehículo').css('width', '200px').css('height', 'auto');
                            imagenesContainer.append($('<div>').addClass('imagen-vehiculo').append(imgElement).append('<br>'));
                        });
                    } else {
                        imagenesContainer.append('<p>No se encontraron imágenes para este vehículo.</p>');
                    }
                } else {
                    alert('No se encontraron detalles para este vehículo.');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar los detalles del vehículo: " + error);
                alert('Error al cargar los detalles del vehículo.');
            }
        });
    }

    if (usuarioId) {
        $.ajax({
            url: 'procesar_detalleUsuario.php',
            type: 'GET',
            data: { id: usuarioId },
            dataType: 'json',
            success: function(data) {
                if (data) {
                    $('#id_usuario').val(data.id_usuario);
                    $('#nombre').val(data.nombre);
                    $('#correo').val(data.correo);
                    $('#rol').val(data.rol);
                } else {
                    alert('No se encontraron detalles para este usuario.');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar los detalles del usuario: " + error);
                alert('Error al cargar los detalles del usuario.');
            }
        });
    }
});
