<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;  // Importa el modelo de Cliente
use App\Models\Product; // Importa el modelo de Producto

class DashboardController extends Controller
{
    // Método constructor para requerir autenticación
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Método para mostrar el dashboard
    public function index()
    {
        // Recopilar datos para pasar a la vista del dashboard
        $data = [
            'totalProducts' => Product::count(),     // Total de productos
            // Añadir más datos según sea necesario
        ];

        // Retornar la vista 'dashboard' con los datos recopilados
        return view('layouts.dashboard', compact('data'));
    }
}
