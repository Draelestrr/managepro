<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockEntry;

class StockEntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view stock entries')->only(['index']);
        $this->middleware('permission:create stock entries')->only(['store']);
    }

    public function index(Request $request)
    {
        $filters = $request->only(['product_name', 'category', 'price']);
        $stockEntries = StockEntry::with('product', 'product.category', 'user')
            ->when($filters['product_name'] ?? null, fn($query, $name) => $query->whereHas('product', fn($q) => $q->where('name', 'like', '%' . $name . '%')))
            ->when($filters['category'] ?? null, fn($query, $category) => $query->whereHas('product.category', fn($q) => $q->where('name', 'like', '%' . $category . '%')))
            ->when($filters['price'] ?? null, fn($query, $price) => $query->whereHas('product', fn($q) => $q->where('price', '<=', $price)))
            ->paginate(10);

        return response()->json($stockEntries, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $stockEntry = StockEntry::create([
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'user_id' => auth()->id(),
        ]);

        return response()->json(['message' => 'Stock ingresado con éxito', 'data' => $stockEntry], 201);
    }
}
