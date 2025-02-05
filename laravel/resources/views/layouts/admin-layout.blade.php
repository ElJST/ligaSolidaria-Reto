<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">

    <div class="row">
        <!-- Barra de navegación -->
        <nav class="col-2 bg-light  vh-100 p-2">
            <a class="nav-link active " aria-current="page" href="#">Equipos</a>
            <a class="nav-link" href="#">Participantes</a>
            <a class="nav-link" href="#">Publicaciones</a>
            <a class="nav-link" href="#">Sedes</a>
            <a class="nav-link" href="#">Centros</a>
            <a class="nav-link" href="#">Usuarios</a>
            <!-- Enlace de cerrar sesión -->
            <form id="logout-form" action="" method="POST" class="d-inline">    @csrf
                <button type="submit" class="nav-link btn btn-link">Cerrar Sesión</button>
            </form>
        </nav>
        <div class="col-10">
            @yield('content')
        </div>



    </div>
</div>
</body>
</html>