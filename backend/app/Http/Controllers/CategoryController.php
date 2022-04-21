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
        $this->authorize('create', Category::class);

        $validatedData = $request->validated();

        Category::create($validatedData);

        return response()->noContent();
    }

    public function update(Category $category, CategoryStoreRequest $request)
    {
        $this->authorize('update', Category::class);

        $validatedData = $request->validated();

        $category->update($validatedData);

        return response()->noContent();
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', Category::class);

        $category->delete();

        return response()->noContent();
    }
}
