<!-- Importar librerias de Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
<link rel="stylesheet" href="{{ asset('css/torneos.css') }}">
 
<!-- resources/views/torneos/index.blade.php -->
 
<!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
<!-- Incluye el script independiente -->
<script src="{{ asset('js/torneos.js') }}"></script>
 
<div class="container-fluid" id="fondo_torneos">
    <h1 id="titulo_torneos" class="text-center">TORNEOS</h1>
</div>
 
{{-- Select para filtrar por torneo --}}
<div id="select_torneo">
    <form id="form_torneo">
        @csrf
        <select id="torneo_id" name="torneo-id">
            <option value="">Selecciona un torneo</option>
            @foreach ($torneos as $torneo)
            {{-- si se escoge un torneo, guarda el id --}}
            <option value="{{ $torneo->id_torneo }}" {{ old('torneo_id') == $torneo->id_torneo ? 'selected' : '' }}>
                {{ $torneo->nombre }}
            </option>
            @endforeach
        </select>
        <button class="btn btn-secondary boton-torneo" type="submit">Ver detalles del torneo</button>
    </form>
</div>
 
<!-- Contenedor para mostrar los detalles del torneo -->
<div id="detalle_torneo">
    @if ($torneoSeleccionado)
    @include('torneos.detalle', ['torneo' => $torneoSeleccionado])
    @endif
</div>
 
<!-- Listado de torneos -->
 
{{-- Si hay errores en el formulario --}}
 
<div id="info_torneo">
    <div class="container" id="cont-tarjetas">
        {{-- Si no hay torneos disponibles --}}
        @if($torneos->isEmpty())
        <p>No hay torneos disponibles.</p>
        @else
 
        {{-- Muestra la información de todos los torneos --}}
        <h5 class="text-center titulo-listado">Listado de torneos</h5>
        <div class="d-flex flex-wrap justify-content-center">
            @foreach ($torneos as $torneo)
            {{-- Tarjetas de torneos --}}
            <div class="card p-3 shadow-sm m-2 tarjeta_torneo" data-id="{{ $torneo->id_torneo }}">
                <div class="card-header text-center bg-secondary text-white">
                    <h5 class="card-title mb-0">{{ $torneo->nombre }}</h5>
                </div>
                <img src="{{ $torneo->fk_logo ? $torneo->fk_logo : asset('images/main.jpeg') }}" class="card-img-top" alt="">
                <div class="card-body">
                    <div id="info_torneo">
 
                        <p><strong>Inicia:</strong> {{ \Carbon\Carbon::parse($torneo->fecha_inicio)->format('Y-m-d') }}</p>
                        <p><strong>Finaliza:</strong> {{ \Carbon\Carbon::parse($torneo->fecha_fin)->format('Y-m-d') }}</p>
                        <p><strong>Dirección:</strong> {{ $torneo->localizacion->nombre ?? 'Sin asignar' }}</p>
                    </div>
                    <div class="d-flex justify-content-center mt-3" id="cont_marcador">
                        <div class="text-center me-3">
                            <p class="mb-1" id="placeholder_res"><strong>Último partido:</strong></p>
                            <div class="d-flex justify-content-between align-items-center">
                                @if ($torneo->partidos->isNotEmpty())
                                @php
                                $ultimoPartido = $torneo->partidos->sortByDesc('fecha_partido')->first();
                                @endphp
                                <img src="{{ $ultimoPartido->equipoLocal->multimedia ? $ultimoPartido->equipoLocal->multimedia->foto : asset('images/equipo_default.png') }}" width="35" height="35" alt="">
                                <input type="text" class="form-control text-center mt-1 marcador-input" value="{{ $ultimoPartido->goles_local }}" disabled>
                                <span class="fs-4 mx-2">-</span>
                                <input type="text" class="form-control text-center mt-1 marcador-input" value="{{ $ultimoPartido->goles_visitante }}" disabled>
                                <img src="{{ $ultimoPartido->equipoVisitante->multimedia ? $ultimoPartido->equipoVisitante->multimedia->foto : asset('images/equipo_default.png') }}" width="35" height="35" alt="">
                                @else
                                <p>No hay partidos registrados.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
</div>