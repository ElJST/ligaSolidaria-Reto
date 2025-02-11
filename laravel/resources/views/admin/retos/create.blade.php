@extends('/layouts/admin-layout')
 
@section('title', 'Añadir Reto')
 
@section('content')
<h1>Añadir Reto</h1>
<form action="{{ route('retos.store') }}" method="POST">
    @csrf
 
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
 
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required></textarea>
 
    <label for="estudios">Estudios:</label>
    <input type="text" name="estudios" id="estudios" required>
 
    <label for="fk_centro">Centro:</label>
    <select name="fk_centro" id="fk_centro"
        @if ($userCentro && $centros->contains('nombre', $userCentro)) disabled @endif
        required>
        @foreach ($centros as $centro)
            <option value="{{ $centro->id_centro }}"
                @if ($centro->nombre == $userCentro) selected @endif>
                {{ $centro->nombre }}
            </option>
        @endforeach
    </select>
 
    @if ($userCentro && $centros->contains('nombre', $userCentro))
        <input type="hidden" name="fk_centro" value="{{ $centros->firstWhere('nombre', $userCentro)->id_centro }}">
    @endif
 
    <label for="fk_torneo">Torneo:</label>
    <select name="fk_torneo" required>
        @foreach ($torneos as $torneo)
            <option value="{{ $torneo->id_torneo }}">
                {{ $torneo->nombre }}
            </option>
        @endforeach
    </select>
   
    <br>
 
    <button class="guardar" type="submit">Guardar</button>
</form>
@endsection