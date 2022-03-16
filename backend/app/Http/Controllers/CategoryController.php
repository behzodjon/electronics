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
        $products = $category->products()->with('category')->get();

        return ProductResource::collection($products);
    }
}
