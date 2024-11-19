<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view categories')->only(['index', 'show']);
        $this->middleware('permission:create categories')->only(['store']);
        $this->middleware('permission:edit categories')->only(['update']);
        $this->middleware('permission:delete categories')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $categories = Category::paginate(10);
        return response()->json($categories, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($validated);

        return response()->json(['message' => 'Categoría creada con éxito', 'data' => $category], 201);
    }

    public function show(Category $category)
    {
        return response()->json($category, 200);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($validated);

        return response()->json(['message' => 'Categoría actualizada con éxito', 'data' => $category], 200);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'Categoría eliminada con éxito'], 200);
    }
}
