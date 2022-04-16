<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\Condition;
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


    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();

        $product = Product::create([
            'title' => $data['title'],
            'category_id' => $data['category_id'],
        ]);

        collect($data['prices'])->each(function ($price) use ($product) {
            $priceValues = collect($price['values']);
            $priceValues->each(function ($value, $key) use ($price, $product) {
                if ($value) {
                    $product->storages()->attach($price['storage_id'], ['condition_id' => $key, 'price' => $value]);
                }
            });
        });

        return response()->noContent();
    }

    public function delete(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }
}
