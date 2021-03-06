@extends('layouts.app')


@section('body')

<body>
<div class="container">
    <h4 align="center">Manual de usuario</h4>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">Módulos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/manual/usuarios">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/manual/clientes">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/manual/visitas">Visitas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/manual/cotizacion">Cotización</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/manual/maquinaria">Maquinaria</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/manual/encuesta">Encuesta</a>
            </li>
            </ul>
        </div>
        </nav>
        @yield("body2")
</div>

</body>
@endsection
