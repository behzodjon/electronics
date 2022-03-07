<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductStorageController extends Controller
{
    public function index(Product $product)
    {
        $storages = $product->storages()->get();

        return response()->json($storages);
    }
}
