@extends('partials.head')

@section('content')
<h1>Dashboard</h1>
<p>¡Bienvenido a Tienda Mohana!</p>

<a href="{{ route('logout') }}" class="btn btn-danger">Cerrar Sesión</a>
@endsection