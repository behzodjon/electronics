<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductShowResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category'])->get();

        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        $product->load(['storages']);

        return ProductShowResource::make($product);
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
                    $product->storages()->attach($price['storage_id'], ['condition_id' => $key+1, 'price' => $value]);
            });
        });

        return response()->noContent();
    }

    public function update(Product $product, ProductUpdateRequest $request)
    {
        $data = $request->validated();

        $product->update([
            'title' => $data['title'],
            'category_id' => $data['category_id'],
        ]);
        $product->storages()->detach();

        collect($data['prices'])->each(function ($price) use ($product) {
            $priceValues = collect($price['values']);
            $priceValues->each(function ($value, $key) use ($price, $product) {
                $product->storages()->attach($price['storage_id'], ['condition_id' => $key + 1, 'price' => $value]);
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
