<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view products')->only(['index', 'show']);
        $this->middleware('permission:create products')->only(['store']);
        $this->middleware('permission:edit products')->only(['update']);
        $this->middleware('permission:delete products')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $filters = $request->only(['name', 'category']);
        $products = Product::with('category', 'supplier')
            ->when($filters['name'] ?? null, fn($query, $name) => $query->where('name', 'like', '%' . $name . '%'))
            ->when($filters['category'] ?? null, fn($query, $category) => $query->whereHas('category', fn($q) => $q->where('name', 'like', '%' . $category . '%')))
            ->paginate(10);

        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'stock_min' => 'required|integer|min:0',
        ]);

        $product = Product::create($validated);

        return response()->json(['message' => 'Producto creado con éxito', 'data' => $product], 201);
    }

    public function show(Product $product)
    {
        return response()->json($product->load('category', 'supplier'), 200);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'stock_min' => 'required|integer|min:0',
        ]);

        $product->update($validated);

        return response()->json(['message' => 'Producto actualizado con éxito', 'data' => $product], 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['message' => 'Producto eliminado con éxito'], 200);
    }
}
