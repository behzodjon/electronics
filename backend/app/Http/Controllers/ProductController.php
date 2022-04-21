<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Condition;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Resources\ProductResource;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
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
        $this->authorize('create', Product::class);

        $data = $request->validated();

        // Check if image was given and save on local file system
        if (isset($data['image'])) {
            $relativePath  = $this->saveImage($data['image']);
            $data['image'] = $relativePath;
        }

        $product = Product::create([
            'title' => $data['title'],
            'category_id' => $data['category_id'],
            'image' => $data['image'] ?? null,
        ]);

        //attach new values
        collect($data['prices'])->each(function ($price) use ($product) {
            collect($price['values'])->each(function ($value, $key) use ($price, $product) {
                $product->storages()->attach($price['storage_id'], ['condition_id' => $key + 1, 'price' => $value]);
            });
        });

        return response()->noContent();
    }

    public function update(Product $product, ProductUpdateRequest $request)
    {
        $this->authorize('update', Product::class);

        $data = $request->validated();

        // Check if image was given and save on local file system
        if (isset($data['image'])) {
            $relativePath = $this->saveImage($data['image']);
            $data['image'] = $relativePath;

            // If there is an old image, delete it
            if ($product->image) {
                $absolutePath = public_path($product->image);
                File::delete($absolutePath);
            }
        }

        $product->update([
            'title' => $data['title'],
            'category_id' => $data['category_id'],
            'image' => $data['image'] ?? null,
        ]);

        //remove old values to update
        $product->storages()->detach();

        //attach new updated values
        collect($data['prices'])->each(function ($price) use ($product) {
            collect($price['values'])->each(function ($value, $key) use ($price, $product) {
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

    private function saveImage($image)
    {
        // Check if image is valid base64 string
        if (preg_match('/^data:image\/(\w+);base64,/', $image, $type)) {
            // Take out the base64 encoded text without mime type
            $image = substr($image, strpos($image, ',') + 1);
            // Get file extension
            $type = strtolower($type[1]); // jpg, png, gif

            // Check if file is an image
            if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                throw new \Exception('invalid image type');
            }
            $image = str_replace(' ', '+', $image);
            $image = base64_decode($image);

            if ($image === false) {
                throw new \Exception('base64_decode failed');
            }
        } else {
            throw new \Exception('did not match data URI with image data');
        }

        $dir = 'images/';
        $file = Str::random() . '.' . $type;
        $absolutePath = public_path($dir);
        $relativePath = $dir . $file;
        if (!File::exists($absolutePath)) {
            File::makeDirectory($absolutePath, 0755, true);
        }
        file_put_contents($relativePath, $image);

        return $relativePath;
    }
}
