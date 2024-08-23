// Cargar detalles del vehículo
var urlParams = new URLSearchParams(window.location.search);
var vehiculoId = urlParams.get('id');

if (vehiculoId) {
    $.ajax({
        url: 'procesar_detalleVehiculo.php',
        type: 'GET',
        data: { id: vehiculoId },
        dataType: 'json',
        success: function(data) {
            if (data) {
                $('#id_vehiculo').val(data.ID_VEHICULO);
                $('#marca').val(data.MARCA);
                $('#modelo').val(data.MODELO);
                $('#year').val(data.AÑO);
                $('#precio').val(data.PRECIO);
                $('#descripcion').val(data.DESCRIPCION);
                $('#estado').val(data.ESTADO);
                $('#vendedor').val(data.VENDEDOR);
                $('#tel').val(data.TELEFONO_VENDEDOR);

                // Mostrar las imágenes
                var imagenesContainer = $('#imagenes-vehiculo');
                if (data.imagenes.length > 0) {
                    data.imagenes.forEach(function(imagen) {
                        var imgElement = $('<img>').attr('src', imagen).attr('alt', 'Imagen del vehículo');
                        imagenesContainer.append($('<div>').addClass('imagen-vehiculo').append(imgElement));
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
