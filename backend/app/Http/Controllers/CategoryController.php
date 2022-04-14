<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        return response()->json($categories);
    }

    public function show(Category $category)
    {

        return response()->json($category);
    }

    // public function show(Category $category)
    // {
    //     $products = $category->products()->with('category')->get();

    //     return ProductResource::collection($products);
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required'],
        ]);

        Category::create($validatedData);

        return response()->noContent();
    }

    public function update(Category $category, Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required'],
        ]);

        $category->update($validatedData);

        return response()->noContent();
    }

    public function delete(Category $category)
    {

        $category->delete();

        return response()->noContent();
    }
}
