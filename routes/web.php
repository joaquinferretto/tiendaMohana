<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/contacto', [HomeController::class, 'contacto']);
Route::resource('productos', ProductoController::class)->middleware('auth');
Route::get('/catalogo', [HomeController::class, 'catalogo']);
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('productos', ProductoController::class);
