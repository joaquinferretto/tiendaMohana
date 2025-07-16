<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Tienda Mohana</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">Catálogo</a>
        </li>

        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('productos.index') }}">Gestionar Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ventas.index') }}">Ver Ventas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ventas.create') }}">Registrar Venta</a>
          </li>
        @endauth
      </ul>

      <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item">
            <span class="navbar-text text-white me-2">
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
        @endauth
      </ul>
    </div>
  </div>
</nav>
