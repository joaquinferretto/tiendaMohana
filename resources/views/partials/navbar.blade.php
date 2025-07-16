<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Tienda Mohana</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">

                <!-- Siempre visible -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/catalogo') }}">Catálogo</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contacto') }}">Contacto</a>
                </li>

                @if (Auth::check())
                    @if (Auth::user()->rol === 'admin')
                        <!-- Navbar para admin -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                Gestionar Productos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('productos.index') }}">Ver Productos</a></li>
                                <li><a class="dropdown-item" href="{{ route('productos.create') }}">Crear Producto</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/usuarios') }}">Gestionar Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/pedidos') }}">Gestionar Pedidos</a>
                        </li>
                    @else
                        <!-- Navbar para cliente -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/carrito') }}">Mi Carrito</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/pedidos') }}">Mis Pedidos</a>
                        </li>
                    @endif
                @endif

            </ul>

            <ul class="navbar-nav ms-auto">
                @if (Auth::check())
                    <li class="nav-item">
                        <span class="navbar-text text-white">
                            Bienvenido, {{ Auth::user()->nombre }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Cerrar Sesión</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
