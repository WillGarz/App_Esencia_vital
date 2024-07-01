@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Crear Categoría</h1>
        <div class="form-container">
            <form method="POST" action="{{ route('categorias.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required placeholder="Nombre"
                    required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion"  placeholder="Agregue una descripción" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
