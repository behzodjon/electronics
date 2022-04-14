<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\CategoryResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category'])->get();

        return ProductResource::collection($products);
    }

    public function delete(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }
}
