// cuando el documento esté listo
$(document).ready(function () {
    // Manejar clic en una tarjeta de torneo
    $('.tarjeta_torneo').click(function () {
        var torneoId = $(this).data('id'); // Obtener el ID del torneo
 
        if (torneoId) {
            $.ajax({
                url: '/torneos/' + torneoId, // URL para obtener los detalles del torneo
                type: 'GET',
                success: function (data) {
                    $('#detalle_torneo').html(data); // Mostrar detalles del torneo
                },
                error: function () {
                    $('#detalle_torneo').html('<p>Error al cargar el torneo.</p>');
                }
            });
        }
    });
 
    // se selecciona el formulario con id form_torneo y se le asigna el evento submit que se ejecuta cuando se hace clic en el botón de enviar
    $('#form_torneo').submit(function (event) {
        event.preventDefault(); // Evita el envío normal del formulario
 
        // se obtiene el valor seleccionado en el campo torneo_id
        var torneoId = $('#torneo_id').val(); //var devuelve el id
        // si hay un valor seleccionado se ejecuta la petición ajax
        if (torneoId) {
            // ajax permite hacer peticion http al servidor sin recargar la pagina
            $.ajax({
                // se define la url a la que se va a hacer la petición
                url: '/torneos/' + torneoId,
                type: 'GET', // se define el método de la petición
                // si la petición es exitosa se ejecuta la función success
                success: function (data) {
                    // se asigna el html devuelto por la petición al div con id detalle_torneo
                    $('#detalle_torneo').html(data);
                },
                // si la petición falla se ejecuta la función error
                error: function () {
                    $('#detalle_torneo').html('<p>Error al cargar el torneo.</p>');
                }
            });
        } else {
            // si no hay un valor seleccionado se asigna un mensaje al div con id detalle_torneo
            $('#detalle_torneo').html('<p>Selecciona un torneo para ver los detalles.</p>');
        }
    });
});
 
// $(document).ready(function () {
//     $('#torneo_id').change(function () {
//         event.preventDefault(); // Evita el envío normal del formulario
//         var torneoId = $(this).val();
//         if (torneoId) {
//             $.ajax({
//                 url: '/torneos/' + torneoId,
//                 type: 'GET',
//                 success: function (data) {
//                     $('#detalle_torneo').html(data);
//                 },
//                 error: function () {
//                     $('#detalle_torneo').html('<p>Error al cargar el torneo.</p>');
//                 }
//             });
//         } else {
//             $('#detalle_torneo').html('');
//         }
//     });
// });