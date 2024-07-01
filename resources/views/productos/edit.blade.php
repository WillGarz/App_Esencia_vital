@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Editar Producto</h1>
        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="number" id="precio" name="precio" class="form-control" value="{{ $producto->precio }}"
                    step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="descripcionProducto" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcionProducto" name="descripcion" rows="3">{{ $producto->descripcion }}</textarea>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{ $producto->cantidad }}" required>
            </div>

            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoría:</label>
                <select id="categoria_id" name="categoria_id" class="form-select" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->categoria_id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
                @if ($producto->imagen)
                    <img src="{{ asset('images/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                        class="img-thumbnail mt-2" style="width: 150px; height: auto;">
                        <br>
                    <input type="checkbox" id="eliminar_imagen" name="eliminar_imagen"> Eliminar imagen
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
