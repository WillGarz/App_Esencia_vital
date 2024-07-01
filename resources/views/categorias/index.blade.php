@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Categorías</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-success">Crear Nueva Categoría</a>
        <ul class="list-group mt-3">
            @foreach ($categorias as $categoria)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        @if($categoria->imagen)
                            <img src="{{ asset('images/categorias/' . $categoria->imagen) }}" alt="{{ $categoria->nombre }}" class="categoria-imagen img-thumbnail">
                        @endif
                        {{ $categoria->nombre }}
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar la categoría {{ $categoria->nombre }}?')">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
