<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockEntryController;

// Redirección inicial
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rutas protegidas
Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Inventario
    Route::resource('products', ProductController::class, [
        'as' => 'web' // Cambia el prefijo del nombre a "web"
    ]);
    Route::resource('suppliers', SupplierController::class, [
        'as' => 'web' // Cambia el prefijo del nombre a "web"
    ]);
    Route::resource('categories', CategoryController::class, [
        'as' => 'web' // Cambia el prefijo del nombre a "web"
    ]);

    // Gestión de usuarios
    Route::resource('user_gestor', UserController::class, [
        'as' => 'web' // Cambia el prefijo del nombre a "web"
    ]);

    // Entrada de stock
    Route::resource('stock_entries', StockEntryController::class, [
        'as' => 'web' // Cambia el prefijo del nombre a "web"
    ]);
});

// Autenticación
require __DIR__ . '/auth.php';
