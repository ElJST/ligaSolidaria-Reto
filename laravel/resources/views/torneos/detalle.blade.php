{{-- detalle.blade.php --}}
<!-- Mostrar detalles del torneo seleccionado -->
 
@if ($torneo)
    <div class="container" id="cont-tarjetas">
        <div class="justify-content-center">
            <div class="card p-3 shadow-sm m-2" id="tarjeta_torneo">
                <div class="card-header text-center">
                    <h5 class="card-title mb-0">{{ $torneo->nombre }}</h5>
                </div>
                <img src="{{ $torneo->fk_logo ? $torneo->fk_logo : asset('images/main.jpeg') }}" class="card-img-top" alt="Torneo Logo">
                <div class="card-body">
                    <div id="info_torneo">
                        <p><strong>Inicia:</strong> {{ \Carbon\Carbon::parse($torneo->fecha_inicio)->format('Y-m-d') }}</p>
                        <p><strong>Finaliza:</strong> {{ \Carbon\Carbon::parse($torneo->fecha_fin)->format('Y-m-d') }}</p>
                        <p><strong>Dirección:</strong> {{ $torneo->localizacion->nombre ?? 'Sin asignar' }}</p>
 
                        @if ($torneo->partidos->isNotEmpty())
                            @php
                                $ultimoPartidoSeleccionado = $torneo->partidos->sortByDesc('fecha_partido')->first();
                            @endphp
                            <div class="d-flex justify-content-center mt-3" id="cont_marcador">
                                <div class="text-center me-3">
                                    <p class="mb-1" id="placeholder_res"><strong>Último partido:</strong></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        {{-- Foto del equipo local --}}
                                        <img src="{{ $ultimoPartidoSeleccionado->equipoLocal->multimedia ? $ultimoPartidoSeleccionado->equipoLocal->multimedia->foto : asset('images/equipo_default.png') }}" width="35" height="35" alt="">
                                        <input type="text" class="form-control text-center mt-1 marcador-input" value="{{ $ultimoPartidoSeleccionado->goles_local }}" disabled>
                                        <span class="fs-4 mx-2">-</span>
                                        <input type="text" class="form-control text-center mt-1 marcador-input" value="{{ $ultimoPartidoSeleccionado->goles_visitante }}" disabled>
                                        {{-- Foto del equipo visitante --}}
                                        <img src="{{ $ultimoPartidoSeleccionado->equipoVisitante->multimedia ? $ultimoPartidoSeleccionado->equipoVisitante->multimedia->foto : asset('images/equipo_default.png') }}" width="35" height="35" alt="">
                                    </div>
                                </div>
                            </div>
                        @else
                            <p id="goles_ultimo_partido"><strong>Último Partido:</strong> No hay partidos registrados.</p>
                        @endif
                    </div>
                   
                    <div class="enlaces py-4 d-flex justify-content-center">
                        {{-- enlace a clasificacion --}}
                        <a class="btn btn-secondary" href={{-- "{{ route('clasificacion', ['id_torneo' => $torneo->id_torneo]) }}" --}}>Ver Clasificación</a>
 
                        {{-- enlace a retos --}}
                        <a class="btn btn-secondary"  href="{{ route('retos.indexsololectura', ['fk_torneo' => $torneo->id_torneo]) }}">Ver Retos</a>
 
                        {{-- enlace a equipos --}}
                        <a class="btn btn-secondary" href={{-- "{{ route('equipos', ['id_torneo' => $torneo->id_torneo]) }}" --}}>Ver Equipos</a>
 
                        {{-- Enlace a centros que participan --}}
                        <a class="btn btn-secondary" href="{{ route('centros.index', ['id_torneo' => $torneo->id_torneo]) }}">
                            Participantes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif