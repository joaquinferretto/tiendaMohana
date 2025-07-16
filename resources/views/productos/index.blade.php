@extends('partials.head')

@section('content')

<h1 class="mb-4">Listado de Productos</h1>

<a href="{{ route('productos.create') }}" class="btn btn-success mb-3">
    Crear Producto
</a>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($productos->isEmpty())
    <div class="alert alert-info">
        No hay productos cargados aún.
    </div>
@else
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Color</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Tallas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>{{ $producto->color }}</td>
                <td>{{ $producto->categoria }}</td>
                <td>
                    @if($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}" width="80">
                    @else
                        Sin imagen
                    @endif
                </td>
                <td>
                    @foreach ($producto->tallas as $talla)
                        <span class="badge bg-primary">
                            {{ $talla->talla }} ({{ $talla->stock }})
                        </span>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

@endsection
