<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/

// Página principal: catálogo público (sin login)
Route::get('/', [HomeController::class, 'catalogo'])->name('catalogo');

// Página de contacto (si la quieres mantener)
Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto');

// Login (único para admin)
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas Protegidas (Admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::resource('productos', ProductoController::class)->names('productos');
    Route::resource('ventas', VentaController::class)->names('ventas');
});
