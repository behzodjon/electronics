<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class CategoryProductController extends Controller
{
     public function index(Category $category)
    {
        $products = $category->products()->with('category')->get();

        return ProductResource::collection($products);
    }
}
