<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockEntryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;

// Ruta para obtener información del usuario autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas protegidas con autenticación
Route::middleware('auth:sanctum')->group(function () {
    // Rutas de categorías
    Route::apiResource('categories', CategoryController::class);

    // Rutas de productos
    Route::apiResource('products', ProductController::class);

    // Rutas de entradas de stock
    Route::apiResource('stock_entries', StockEntryController::class)->only(['index', 'store']);

    // Rutas de proveedores
    Route::apiResource('suppliers', SupplierController::class);

    // Rutas de usuarios
    Route::apiResource('users', UserController::class);
});
