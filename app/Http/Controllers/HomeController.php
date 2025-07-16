<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('principal', [
            'title' => 'Página Principal',
            'mensaje' => '¡Bienvenido a Tienda Mohana!'
        ]);
    }

    public function contacto()
    {
        return view('contacto', [
            'title' => 'Contacto'
        ]);
    }

    public function catalogo()
    {
        return view('catalogo', [
            'title' => 'Catálogo de Productos'
        ]);
    }
}
