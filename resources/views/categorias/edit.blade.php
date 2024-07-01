@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Editar Categoría: {{ $categoria->name }}</h1>
        <form method="POST" action="{{ route('categorias.update', $categoria->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $categoria->name }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ $categoria->descripcion }}">
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                @if($categoria->imagen)
                    <img src="{{ asset('images/categorias/'. $categoria->imagen) }}" alt="Imagen actual" width="100">
                    <br>
                    <input type="checkbox" id="eliminar_imagen" name="eliminar_imagen"> Eliminar imagen
                @endif
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
