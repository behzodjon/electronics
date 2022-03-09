<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Condition;
use App\Models\Product;
use App\Models\Storage;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    public function show(Product $product, Storage $storage, Condition $condition)
    {
        $product = $condition->products()
            ->wherePivot('product_id', $product->id)
            ->wherePivot('storage_id', $storage->id)
            ->first();

        return new ProductResource($product);
    }
}
