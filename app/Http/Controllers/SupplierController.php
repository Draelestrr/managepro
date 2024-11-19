<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view suppliers')->only(['index', 'show']);
        $this->middleware('permission:create suppliers')->only(['store']);
        $this->middleware('permission:edit suppliers')->only(['update']);
        $this->middleware('permission:delete suppliers')->only(['destroy']);
    }

    public function index()
    {
        $suppliers = Supplier::paginate(10);
        return response()->json($suppliers, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $supplier = Supplier::create($validated);

        return response()->json(['message' => 'Proveedor creado con éxito', 'data' => $supplier], 201);
    }

    public function show(Supplier $supplier)
    {
        return response()->json($supplier, 200);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $supplier->update($validated);

        return response()->json(['message' => 'Proveedor actualizado con éxito', 'data' => $supplier], 200);
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return response()->json(['message' => 'Proveedor eliminado con éxito'], 200);
    }
}
