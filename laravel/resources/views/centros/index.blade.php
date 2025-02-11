<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centros Participantes</title>
    <!-- Importar librerias de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/torneos.css') }}">
</head>
 
<body>
    <div class="container-fluid" id="fondo_centros">
        <h1 id="titulo_centros" class="text-center">Centros Participantes</h1>
        <div class="text-center mb-4">
            <a class="btn btn-secondary" href="{{ route('torneos.index') }}">Volver a los torneos</a>
        </div>
 
        {{-- Si no hay centros asociados al torneo --}}
        @if ($centros->isEmpty())
        <p id="texto_error">No hay centros participando en este torneo.</p>
        @else
        <div id="contenedor_tarjetas" class="d-flex flex-wrap justify-content-center">
            @foreach ($centros as $centro)
            <div class="card p-3 shadow-sm m-2" id="tarjeta_centro" style="width: 30rem;">
                <div class="card-header text-center bg-secondary text-white">
                    <h5 class="card-title mb-0">{{ $centro->nombre }}</h5>
                </div>
                {{-- Mostrar el logo del centro si existe --}}
                <img src="{{ $centro->multimedia && $centro->multimedia->fk_foto ? $centro->multimedia->fk_foto : asset('images/centro_default.jpg') }}" class="card-img-top" alt="">
                <div class="card-body">
                    <div id="info_centro">
                        <p><strong>Dirección:</strong> {{ $centro->direccion }}</p>
 
                        {{-- Mostrar la web del centro --}}
                        @if ($centro->web)
                        <p><strong>Web:</strong>
                            <a href="{{ $centro->web }}" target="_blank">{{ $centro->web }}</a>
                        </p>
                        @endif
 
                        {{-- Mostrar los equipos del centro --}}
                        @if ($centro->equipos->isNotEmpty())
                        <ul>
                            @foreach ($centro->equipos as $equipo)
                            <li><strong>Equipo:</strong> {{ $equipo->nombre }}</li>
                            @endforeach
                        </ul>
                        @else
                        <p>No hay equipos en este centro.</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</body>
 
</html>