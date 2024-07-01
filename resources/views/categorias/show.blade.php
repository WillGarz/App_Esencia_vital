@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">{{ $categoria->name }}</h1>
        <p>{{ $categoria->descripcion }}</p>
        @if ($categoria->imagen)
            <img src="{{ asset('images/categorias/'. $categoria->imagen) }}" alt="{{ $categoria->name }}"
                class="img-thumbnail mb-3" style="width: 200px; height: auto;">
        @endif
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Regresar a Categorías</a>
    </div>
@endsection
