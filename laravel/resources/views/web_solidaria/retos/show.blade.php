<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $reto->nombre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $reto->nombre }}</h1>
        <p><strong>Descripción:</strong> {{ $reto->descripcion }}</p>
        <p><strong>Estudios:</strong> {{ $reto->estudios }}</p>

        @if ($reto->multimedia && $reto->multimedia->first() && $reto->multimedia->first()->foto)
            <img src="{{ url('storage/' . $reto->multimedia->first()->foto) }}" class="img-fluid" alt="Imagen de {{ $reto->nombre }}">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid" alt="Imagen por defecto">
        @endif

        <a href="{{ route('retos.indexsololectura') }}" class="btn btn-primary mt-3">Volver</a>
    </div>
</body>
</html>
