@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">{{ $producto->nombre }}</h1>
        <p>Precio: ${{ $producto->precio }}</p>
        <p>Categoría: {{ $producto->categoria->nombre }}</p>
        <p class="card-text"><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
        <p>Cantidad: {{ $producto->cantidad }}</p>
        @if($producto->imagen)
            <img src="{{ asset('images/productos/' . $producto->imagen) }}" alt="{{ $producto->name }}"
            class="img-thumbnail mb-3" style="width: 200px; height: auto;">
        @endif
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Regresar a Productos</a>
    </div>
@endsection
