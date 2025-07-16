@extends('partials.head')

@section('content')

<h1 class="mb-4">Editar Producto</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('productos.update', $producto->id_producto) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control" required>{{ $producto->descripcion }}</textarea>
    </div>

    <div class="mb-3">
        <label>Precio</label>
        <input type="number" name="precio" value="{{ $producto->precio }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Color</label>
        <input type="text" name="color" value="{{ $producto->color }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Categoría</label>
        <input type="text" name="categoria" value="{{ $producto->categoria }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Imagen actual:</label><br>
        @if($producto->imagen)
            <img src="{{ asset('storage/' . $producto->imagen) }}" width="120" class="mb-2">
        @else
            <p>No hay imagen cargada.</p>
        @endif
    </div>

    <div class="mb-3">
        <label>Nueva Imagen (opcional)</label>
        <input type="file" name="imagen" class="form-control">
    </div>

    <h4>Tallas</h4>
    <div id="tallas-container">
        @if($producto->tallas->count())
            @foreach ($producto->tallas as $index => $talla)
                <div class="row mb-2">
                    <div class="col-md-4">
                        <input type="text" name="tallas[{{ $index }}][talla]" class="form-control" placeholder="Talla" value="{{ $talla->talla }}">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="tallas[{{ $index }}][stock]" class="form-control" placeholder="Stock" value="{{ $talla->stock }}">
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-danger remove-talla">-</button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row mb-2">
                <div class="col-md-4">
                    <input type="text" name="tallas[0][talla]" class="form-control" placeholder="Talla">
                </div>
                <div class="col-md-4">
                    <input type="number" name="tallas[0][stock]" class="form-control" placeholder="Stock">
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-danger remove-talla">-</button>
                </div>
            </div>
        @endif
    </div>

    <button type="button" class="btn btn-success add-talla mt-2">Agregar Talla</button>

    <button class="btn btn-primary mt-3">Guardar Cambios</button>
</form>

<script>
    document.querySelector('.add-talla').addEventListener('click', function() {
        let container = document.getElementById('tallas-container');
        let index = container.querySelectorAll('.row').length;

        let html = `
            <div class="row mb-2">
                <div class="col-md-4">
                    <input type="text" name="tallas[${index}][talla]" class="form-control" placeholder="Talla">
                </div>
                <div class="col-md-4">
                    <input type="number" name="tallas[${index}][stock]" class="form-control" placeholder="Stock">
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-danger remove-talla">-</button>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-talla')) {
            e.target.closest('.row').remove();
        }
    });
</script>

@endsection
