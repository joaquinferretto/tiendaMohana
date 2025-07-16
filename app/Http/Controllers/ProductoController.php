<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ProductoTalla;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('tallas')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes', 'public');
        }

        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => 0,
            'talla' => null,
            'color' => $request->color,
            'imagen' => $path,
            'estado' => 'activo',
            'categoria' => $request->categoria,
        ]);

        if ($request->has('tallas')) {
            foreach ($request->tallas as $tallaData) {
                if (!empty($tallaData['talla']) && $tallaData['stock'] !== null) {
                    ProductoTalla::create([
                        'id_producto' => $producto->id_producto,
                        'talla' => $tallaData['talla'],
                        'stock' => $tallaData['stock'],
                    ]);
                }
            }
        }

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        $producto = Producto::with('tallas')->findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $producto = Producto::findOrFail($id);

        $path = $producto->imagen;
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes', 'public');
        }

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'color' => $request->color,
            'imagen' => $path,
            'estado' => $request->estado ?? 'activo',
            'categoria' => $request->categoria,
        ]);

        // Actualizar tallas:
        if ($request->has('tallas')) {
            // Borra las tallas actuales y las recrea
            $producto->tallas()->delete();

            foreach ($request->tallas as $tallaData) {
                if (!empty($tallaData['talla']) && $tallaData['stock'] !== null) {
                    ProductoTalla::create([
                        'id_producto' => $producto->id_producto,
                        'talla' => $tallaData['talla'],
                        'stock' => $tallaData['stock'],
                    ]);
                }
            }
        }

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado.');
    }
}
