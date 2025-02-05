@extends('layout')

@section('title', 'Añadir Reto')

@section('content')
<h1>Multimedia</h1>
<form action="{{ route('multimedia.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="fk_reto">Selecciona un reto:</label>
    <select name="fk_reto" required>
        @foreach ($retos as $reto)
            <option value="{{ $reto->id_reto }}">{{ $reto->nombre }}</option>
        @endforeach
    </select>

    <input type="file" name="imagen" accept="image/*" required>
    <button type="submit">Subir Imagen</button>
</form>
    <button type="submit">Guardar</button>
</form>
@endsection
