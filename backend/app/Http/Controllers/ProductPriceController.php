<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\Product;
use App\Models\Storage;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    public function show()
    {
        $product = Product::first();
        $storage = Storage::first();
        $condition = Condition::first();
        $data = $product->storages()->whereId($storage->id);
        
    }
}
