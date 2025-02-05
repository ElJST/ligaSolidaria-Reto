@extends('/layouts/admin-layout')

@section('title', 'Modificar Reto')

@section('content')
<h1>Modificar Reto</h1>

<!-- Mostrar mensajes de error -->
@if ($errors->any())
    <div class="error-messages">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('retos.update', $retos->id_reto) }}" method="POST" class="form">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input 
            type="text" 
            name="nombre" 
            id="nombre" 
            value="{{ old('nombre', $retos->nombre) }}" 
            required>
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea 
            name="descripcion" 
            id="descripcion" 
            required>{{ old('descripcion', $retos->descripcion) }}</textarea>
    </div>

    <div class="form-group">
        <label for="estudios">Estudios:</label>
        <input 
            type="text" 
            name="estudios" 
            id="estudios" 
            value="{{ old('estudios', $retos->estudios) }}" 
            required>
    </div>

    <div class="form-group">
        <label for="fk_centro">Centro:</label>
        <select 
            name="fk_centro" 
            id="fk_centro" 
            @if ($userCentro !== 'Administrador') disabled @endif 
            required>
            @foreach ($centros as $centro)
                <option 
                    value="{{ $centro->id_centro }}" 
                    @if (($userCentro !== 'Administrador' && $centro->nombre == $userCentro) || 
                         ($userCentro === 'Administrador' && $retos->fk_centro == $centro->id_centro)) 
                        selected 
                    @endif>
                    {{ $centro->nombre }}
                </option>
            @endforeach
        </select>

        <!-- Campo oculto para enviar el valor cuando está deshabilitado -->
        @if ($userCentro !== 'Administrador')
            @php
                $centroSeleccionado = $centros->firstWhere('nombre', $userCentro);
            @endphp
            @if ($centroSeleccionado)
                <input type="hidden" name="fk_centro" value="{{ $centroSeleccionado->id_centro }}">
            @endif
        @endif
    </div>

    <div class="form-group">
        <label for="fk_torneo">Torneo:</label>
        <select name="fk_torneo" id="fk_torneo" required>
            @foreach ($torneos as $torneo)
                <option 
                    value="{{ $torneo->id_torneo }}" 
                    {{ $retos->fk_torneo == $torneo->id_torneo ? 'selected' : '' }}>
                    {{ $torneo->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@endsection
