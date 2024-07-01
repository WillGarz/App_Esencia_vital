<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cantidad' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto = new Producto($validatedData);

        if ($request->hasFile('imagen')) {
            $imagenNombre = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images/productos'), $imagenNombre);
            $producto->imagen = $imagenNombre;
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', '¡Producto agregado correctamente!');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cantidad' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto->fill($validatedData);

        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($producto->imagen) {
                if (file_exists(public_path('images/productos/' . $producto->imagen))) {
                    unlink(public_path('images/productos/' . $producto->imagen));
                }
            }

            $imagenNombre = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images/productos'), $imagenNombre);
            $producto->imagen = $imagenNombre;
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', '¡Producto actualizado correctamente!');
    }

    public function destroy(Producto $producto)
    {
        if ($producto->imagen) {
            if (file_exists(public_path('images/productos/' . $producto->imagen))) {
                unlink(public_path('images/productos/' . $producto->imagen));
            }
        }

        $producto->delete();
        return redirect()->route('productos.index')->with('success', '¡Producto eliminada correctamente!');
    }
}
