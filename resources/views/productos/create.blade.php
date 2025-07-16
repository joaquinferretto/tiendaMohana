@extends('partials.head')

@section('content')

<h1>Crear Producto</h1>

<form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label>Precio</label>
        <input type="number" name="precio" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Color</label>
        <input type="text" name="color" class="form-control">
    </div>

    <div class="mb-3">
        <label>Categoría</label>
        <input type="text" name="categoria" class="form-control">
    </div>

    <div class="mb-3">
        <label>Imagen</label>
        <input type="file" name="imagen" class="form-control">
    </div>

    <h4>Tallas</h4>
    <div id="tallas-container">
        <div class="row mb-2">
            <div class="col-md-4">
                <input type="text" name="tallas[0][talla]" class="form-control" placeholder="Talla">
            </div>
            <div class="col-md-4">
                <input type="number" name="tallas[0][stock]" class="form-control" placeholder="Stock">
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-success add-talla">+</button>
            </div>
        </div>
    </div>

    <button class="btn btn-primary mt-3">Guardar</button>
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
