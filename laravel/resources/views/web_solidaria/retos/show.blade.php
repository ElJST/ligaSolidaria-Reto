<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $reto->nombre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* VARIABLES DE COLOR */
        :root {
            --main-bg-color: rgb(84, 131, 94);
            --main-bg-text-color: white;
            --main-bg-color-middle: rgb(197, 25, 45);
            --main-bg-color-light: rgba(0, 51, 102, 0.02);
            --main-text-color: #333;
            --main-title-color: #8f1902;
        }
        body {
            font-family: 'Helvetica', 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: var(--main-bg-color);
            color: var(--main-bg-text-color);
            padding: 10px;
            width: 100%;
            top: 0;
            left: 0;
            transition: top 0.3s;
        }

        .navbar-visible {
            transform: translateY(0);
        }

        .navbar-fixed {
            transform: translateY(0);
            display: inline-block;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: var(--main-bg-text-color) !important;
        }

        .navbar-nav .nav-link:hover {
            color: var(--main-title-color) !important;
        }

        .navbar-toggler-icon {
            background-color: var(--main-bg-text-color);
        }
        .carousel-item img {
            position: relative;
            width: 100%;
            height: 400px; 
            overflow: hidden; 
        }
    </style>
</head>
<body>
    <nav id="mainNavbar" class="navbar navbar-expand-lg navbar navbar-hidden">
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

    <section class="container mt-4">
        <h1 class="d-flex justify-content-center"><Strong>{{ ucfirst($reto->nombre) }}</Strong></h1>
    </section>
    
    <main class="container mt-4 mb-4">
    <div class="row">
        <!-- Columna de la imagen -->
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            @if ($reto->multimedia->isNotEmpty())
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($reto->multimedia as $index => $media)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($reto->multimedia as $index => $media)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="data:image/jpeg;base64,{{ $media->foto }}" class="d-block w-100 rounded" alt="Imagen de {{ $reto->nombre }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            @else
                <img src="{{ asset('images/fto_prueba.png') }}" alt="fto_prueba" class="img-fluid">
            @endif
        </div>

        <!-- Columna de los datos alineados a la derecha -->
        <div class="col-md-6 d-flex flex-column pt-4">
            <p class="text-center w-100"><strong>{{$centros->nombre}}</strong></p>
            <p class="text-start w-100"><strong>Estudios:</strong> {{ $reto->estudios }}</p>
            <p class="text-start w-100"><strong>Descripción:</strong> {{ $reto->descripcion }}</p>
        </div>
    </div>
</main>

    <section class="container d-flex justify-content-end mb-4">
        <a href="{{ route('retos.indexsololectura') }}" class="btn btn-primary">Volver</a>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
