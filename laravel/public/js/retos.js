$(document).ready(function() {
    function cargarRetos() {
        let torneo = $('#torneo').val();
        let centro = $('#centro').val();
        
        $.ajax({
            url: '/retos',
            type: 'GET',
            data: { fk_torneo: torneo, fk_centro: centro },
            success: function(response) {
                let retosHtml = '';
                response.data.forEach(reto => {
                    retosHtml += `
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">${reto.nombre}</h5>
                                    <p class="card-text">${reto.descripcion}</p>
                                    <p><strong>Estudios:</strong> ${reto.estudios}</p>
                                    ${reto.multimedia ? `<img src="/${reto.multimedia.foto}" class="img-fluid">` : ''}
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#retos-container').html(retosHtml);
            },
            error: function(error) {
                console.error('Error cargando los retos', error);
            }
        });
    }

    // Al cambiar el torneo, actualizar los centros
    $('#torneo').change(function() {
        let torneoId = $(this).val();
        $.ajax({
            url: '/centros-por-torneo/' + torneoId,
            type: 'GET',
            success: function(response) {
                // Asegurarse de que 'centros' está definido antes de intentar recorrerlo
                if (response.centros && Array.isArray(response.centros)) {
                    let centrosHtml = '<option value="">Todos los centros</option>';
                    response.centros.forEach(centro => {
                        centrosHtml += `<option value="${centro.id_centro}">${centro.nombre}</option>`;
                    });
                    $('#centro').html(centrosHtml);
                    cargarRetos(); // Volver a cargar los retos con el nuevo filtro
                } else {
                    console.error('Respuesta incorrecta al obtener los centros');
                }
            },
            error: function(error) {
                console.error('Error al obtener los centros', error);
            }
        });
    });

    // Actualizar los retos al cambiar los filtros
    $('#torneo, #centro').change(cargarRetos);

    // Cargar los retos cuando la página se cargue
    cargarRetos();
});

