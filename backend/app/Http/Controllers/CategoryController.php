<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
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


    public function store(CategoryStoreRequest $request)
    {
        $validatedData = $request->validated();

        Category::create($validatedData);

        return response()->noContent();
    }

    public function update(Category $category, CategoryStoreRequest $request)
    {
        $validatedData = $request->validated();

        $category->update($validatedData);

        return response()->noContent();
    }

    public function delete(Category $category)
    {
        $category->delete();

        return response()->noContent();
    }
}
