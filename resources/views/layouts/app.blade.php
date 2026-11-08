<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Examen Práctico III - Grupo 4')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Fredoka & Nunito -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600&family=Nunito:wght@400;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --azul-sadu: #5E6CB3;
            --azul-profundo: #46528F;
            --amarillo-sol: #F5C74D;
            --crema: #FAF6F0;
            --carbon: #2B2D42;
        }

        body {
            background-color: var(--crema);
            color: var(--carbon);
            font-family: 'Nunito', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .brand-font {
            font-family: 'Fredoka', cursive, sans-serif;
            font-weight: 600;
        }

        .navbar-sadu {
            background-color: var(--azul-profundo);
        }

        .btn-sadu-primary {
            background-color: var(--amarillo-sol);
            color: var(--carbon);
            font-weight: 700;
            border-radius: 14px;
            border: none;
        }

        .btn-sadu-primary:hover {
            background-color: #e5b63e;
            color: var(--carbon);
        }

        .card-sadu {
            background-color: #ffffff;
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(43, 45, 66, 0.06);
        }

        .text-sadu {
            color: var(--azul-sadu);
        }
    </style>
    @stack('styles')
</head>

<body>

    <!-- Navbar Global -->
    <nav class="navbar d-print-none navbar-expand-lg navbar-dark navbar-sadu shadow-sm mb-4">
        <div class="container-fluid px-4">
            <!-- Título a la extrema izquierda -->
            <a class="navbar-brand brand-font fs-3" href="{{ url('/') }}">Grupo 4</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú a la extrema derecha -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('clientes.show') }}">Clientes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pedidos.show') }}">Pedidos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('reportes.index') }}">Reportes</a></li>
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="container mb-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="text-center py-3 text-muted border-top mt-auto d-print-none">
        <small>© 2026 Grupo 4 — Módulo: Desarrollo Web Usando Software Libre</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>