@extends('layouts.app')

@section('content') <!-- Define la sección de contenido -->
<section id="inicio">
    <div class="container">
        <h2>Bienvenido a nuestra tienda de cosmética sólida natural</h2>
        <p>Descubre nuestros productos hechos con ingredientes naturales y sostenibles.</p>
    </div>
    @vite(['resources/sass/app.scss', 'resources//js/app.js'])
</section>
@endsection
