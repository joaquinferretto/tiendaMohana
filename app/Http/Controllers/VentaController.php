<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('producto', 'user')->latest()->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('ventas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|exists:producto,id_producto',
            'cantidad' => 'required|integer|min:1'
        ]);

        $producto = Producto::findOrFail($request->id_producto);

        if ($producto->stock < $request->cantidad) {
            return back()->with('error', 'Stock insuficiente.');
        }

        // Descontar stock
        $producto->stock -= $request->cantidad;
        $producto->save();

        Venta::create([
            'id_producto' => $producto->id_producto,
            'id_usuario' => Auth::id(),
            'cantidad' => $request->cantidad
        ]);

        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente.');
    }
}
