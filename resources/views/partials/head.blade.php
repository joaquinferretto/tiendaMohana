<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda Mohana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('partials.navbar')

    <main class="container mt-4">
        @yield('content')
    </main>

    @php
        use Carbon\Carbon;
        $ahora = Carbon::now('America/Argentina/Buenos_Aires');
    @endphp

    <footer class="text-center mt-5">
        <hr>
        <p>&copy; Tienda Mohana - {{ $ahora->format('d/m/Y H:i:s') }} (Hora Buenos Aires)</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
