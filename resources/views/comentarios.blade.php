@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Comentarios</h1>
    <div class="comentario">
        <img src="{{ asset('images/persona1.jpg') }}" alt="Usuario 1" class="img-fluid rounded-circle" style="width: 100px;">
        <div class="texto-comentario">
            <h3>Lau Rojas</h3>
            <p>Funciona super bien ya lo he probado en más de 4 animalitos.</p>
        </div>
    </div>
    <div class="comentario">
        <img src="{{ asset('images/persona2.jpg') }}" alt="Usuario 2" class="img-fluid rounded-circle" style="width: 100px;">
        <div class="texto-comentario">
            <h3>Will Garz</h3>
            <p>Exelente producto mi perrito tenía resequedad en sus garritas muy resecas y este producto le mejoro mucho.</p>
        </div>
    </div>
</div>
@endsection
