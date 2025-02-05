@extends('/layouts/admin-layout')

@section('title', 'Listado de Retos')

@section('content')
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Contenido principal -->    
        <main class="col-10">
            <h1>Lista de Retos</h1>
            <a href="{{ route('retos.create') }}" class="btn btn-primary">Añadir nuevo reto</a>

            <!-- Tabla -->
            <table class="table table-striped table-hover caption-top">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Estudios</th>
                        <th scope="col">Centro</th> <!-- Campo fk_centro -->
                        <th scope="col">Torneo</th> <!-- Campo fk_torneo -->
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
    @foreach ($retos as $reto)
<tr id="reto-{{ $reto->id_reto }}">
<td>{{ $reto->id_reto }}</td>
<td>{{ $reto->nombre }}</td>
<td>{{ $reto->descripcion }}</td>
<td>{{ $reto->estudios }}</td>
<td>{{ $reto->centro ? $reto->centro->nombre : 'No asignado' }}</td>
<td>{{ $reto->torneo ? $reto->torneo->nombre : 'No asignado' }}</td>
<td>
            @if($reto->can_edit_delete)
<a href="{{ route('retos.edit', $reto->id_reto) }}" class="btn btn-warning">Editar</a>
<button class="btn btn-danger delete-reto" data-id="{{ $reto->id_reto }}">Eliminar</button>
            @else
<button class="btn btn-warning" disabled>Editar</button>
<button class="btn btn-danger" disabled>Eliminar</button>
            @endif
</td>
</tr>
    @endforeach
</tbody>
            </table>

            <!-- Paginación -->
            <div class="d-flex justify-content-center">
                {{ $retos->links('pagination::bootstrap-5') }}
            </div>

        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".delete-reto").click(function() {
        let retoId = $(this).data("id"); // Obtiene el ID del reto
        if (confirm("¿Estás seguro de que deseas eliminar este reto?")) {
            $.ajax({
                url: `/retos/${retoId}`, // Ruta para eliminar
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        alert("Reto eliminado correctamente");
                        $("#reto-" + retoId).fadeOut(500, function() { 
                            $(this).remove(); // Elimina la fila con animación
                        });
                    } else {
                        alert("No se pudo eliminar el reto.");
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    alert("Error: Otro Administrador a eliminado este reto");
                }
            });
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
@endsection
