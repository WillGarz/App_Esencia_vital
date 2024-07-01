@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contacto</h1>
    </div>
    <div class="info-contacto">
        <p>Para cualquier consulta, no dudes en contactarnos:</p>
        <p><strong>Email:</strong> esenciavitalcol@gmail.com</p>
        <p><strong>Teléfono:</strong> +57 3138655454</p>
        <p><strong>Dirección:</strong> Chía, Colombia</p>
    </div>
    <div class="formulario-contacto">
        <h3>Envíanos un mensaje</h3>
        <form action="#" method="POST" id="formulario-contacto">
            <input type="text" name="nombre" placeholder="Nombre" required class="form-control mb-2" />
            <input type="email" name="email" placeholder="Email" required class="form-control mb-2" />
            <textarea name="mensaje" placeholder="Mensaje" rows="5" required class="form-control mb-2"></textarea>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    </div>
@endsection
