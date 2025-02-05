@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Reto</h1>

        <p><strong>ID:</strong> {{ $reto->id }}</p>
        <p><strong>Nombre:</strong> {{ $reto->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $reto->descripcion }}</p>
        <p><strong>Estudios:</strong> {{ $reto->estudios }}</p>

        <a href="{{ route('retos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
