<?php

namespace App\Http\Controllers;

use App\Http\Resources\StorageResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductStorageController extends Controller
{
    public function index(Product $product)
    {
        $storages = $product->storages->unique("id");

        return StorageResource::collection($storages);
    }
}
