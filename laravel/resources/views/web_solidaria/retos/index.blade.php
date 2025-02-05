<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog')</title>
    <link rel="stylesheet" href="{{ asset('css/stylesololectura.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Barra de navegación -->
    <nav id="mainNavbar" class="navbar navbar-expand-lg navbar navbar-hidden sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav nav-underline">
                    <a class="nav-link" aria-current="page" href="#">Equipos</a>
                    <a class="nav-link" aria-current="page" href="#carouselExampleCaptions">Participantes</a>
                    <a class="nav-link" href="#ODS">Publicaciones</a>
                    <a class="nav-link" href="#patrocinadores">Sedes</a>
                    <a class="nav-link" href="normativa/normativa.html">Centros</a>
                </div>
            </div>
        </div>
    </nav>
        <!-- Contenido principal -->
        <main class="col-12 p-5">
            <h1 class="text-dark mb-4">Lista de Retos</h1>
            <form method="GET" action="{{ route('retos.indexsololectura') }}">
    <label for="fk_centro">Filtrar por centro:</label>
    <select name="fk_centro" id="fk_centro" onchange="this.form.submit()">
        <option value="">Todos los centros</option>
        @foreach ($centros as $centro)
            <option value="{{ $centro->id_centro }}" {{ $centroSeleccionado == $centro->id_centro ? 'selected' : '' }}>
                {{ $centro->nombre }}
            </option>
        @endforeach
    </select>
    
</form>
           <!-- Contenedor de tarjetas -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-4">
        @foreach ($retos as $reto)
        <div class="col">
            <div class="card h-100 shadow ">
                 <!-- Cargar imagen del reto -->
                 @php
                 $imagen = $reto->multimedia()->first();
                @endphp

                @if ($imagen && $imagen->foto)
                <img src="{{ url('storage/' . $imagen->foto) }}" class="card-img-top" alt="Imagen de {{ $reto->nombre }}">
                @else
                <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Imagen por defecto">
                @endif
            
                <div class="card-body">
                    <h5 class="card-title">{{ $reto->nombre }}</h5>
                    <p class="card-text"><strong>Descripción:</strong> {{ $reto->descripcion }}</p>
                    <p class="card-text"><strong>Estudios:</strong> {{ $reto->estudios }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>


            <!-- Paginación -->
            <div class="d-flex justify-content-center paginacion">
                {{ $retos->links('pagination::bootstrap-5') }}
            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
