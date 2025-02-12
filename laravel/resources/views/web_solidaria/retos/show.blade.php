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
            <div class="col-md-12 col-lg-6 alto d-flex justify-content-center align-items-center">
            @if ($reto->multimedia && $reto->multimedia->foto)
                <img src="data:image/jpeg;base64,{{ $reto->multimedia->foto }}" class="img-fluid" alt="Imagen de {{ $reto->nombre }}">
            @else
                <img src="{{ asset('images/fto_prueba.png') }}" alt="fto_prueba" class="img-fluid">
            @endif

                
            </div>
            <div class="col-md-12 col-lg-6 mt-md-4 mt-sm-4">
                <div class="d-flex justify-content-center">
                    <p><strong>{{$centros->nombre}}</strong></p>
                </div>
                <div>
                    <p><strong>Estudios:</strong> {{ $reto->estudios }}</p>
                    <p><strong>Descripción:</strong> {{ $reto->descripcion }}</p>
                </div>
                
            </div>
        </div>
    </main>
    <section class="container d-flex justify-content-end mb-4">
        <a href="{{ route('retos.indexsololectura') }}" class="btn btn-primary">Volver</a>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
