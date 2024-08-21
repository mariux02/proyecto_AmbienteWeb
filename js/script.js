$(document).ready(function() {
    // Cargar inventario
    cargarInventario();

    function cargarInventario() {
        $.ajax({
            url: 'procesar_inventario.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var rows = '';
                data.forEach(function(i) {
                    rows += '<tr>';
                    rows += '<td>' + i.ID_VEHICULO + '</td>';
                    rows += '<td>' + i.MARCA + '</td>';
                    rows += '<td>' + i.MODELO + '</td>';
                    rows += '<td>' + i.AÑO + '</td>';
                    rows += '<td> $' + i.PRECIO + '</td>';
                    rows += '<td>' + i.VENDEDOR + '</td>';
                    rows += '<td><a class="button" href="detalleVehiculo.php?id=' + i.ID_VEHICULO + '">Detalles</a></td>';
                    rows += '</tr>';
                });
                $('#inventario tbody').html(rows);
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar inventario: " + error);
            }
        });
    }

    //Detalles del vehículo
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
                } else {
                    alert('No se encontraron detalles para este vehículo.');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar los detalles del vehículo: " + error);
                alert('Error al cargar los detalles del vehículo.');
            }
        });
    } else {
        alert('ID de vehículo no especificado.');
    }
});
