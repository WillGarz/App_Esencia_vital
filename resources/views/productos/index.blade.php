@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-success">Crear Nuevo Producto</a>
    <ul class="list-group mt-3">
        @foreach($productos as $producto)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    @if($producto->imagen)
                        <img src="{{ asset('images/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="categoria-imagen img-thumbnail">
                    @endif
                    {{ $producto->nombre }}
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar el producto {{ $producto->nombre }}?')">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
