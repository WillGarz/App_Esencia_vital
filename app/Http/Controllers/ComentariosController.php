<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    public function index()
    {
        return view('comentarios');
    }
}
