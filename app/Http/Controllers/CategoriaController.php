<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagenNombre = null;
        if ($request->hasFile('imagen')) {
            $imagenNombre = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images/categorias'), $imagenNombre);
        }

        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $imagenNombre,
        ]);

        return redirect()->route('categorias.index')->with('¡Categoría agregada correctamente!');
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $categoria = Categoria::findOrFail($id);

        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($categoria->imagen) {
                if (file_exists(public_path('images/categorias/' . $categoria->imagen))) {
                    unlink(public_path('images/categorias/' . $categoria->imagen));
                }
            }

            $imagenNombre = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images/categorias'), $imagenNombre);
            $categoria->imagen = $imagenNombre;
        }

        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;

        try {
            $categoria->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return redirect()->route('categorias.index')->with('¡Categoria actualizada correctamente!!');
    }

    public function destroy(Categoria $categoria)
    {
        if ($categoria->imagen) {
            if (file_exists(public_path('images/categorias/' . $categoria->imagen))) {
                unlink(public_path('images/categorias/' . $categoria->imagen));
            }
        }

        $categoria->delete();
        return redirect()->route('categorias.index')->with('¡Categoria eliminada correctamente!');
    }
}
