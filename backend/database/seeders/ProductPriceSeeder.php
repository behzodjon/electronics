<?php

namespace Database\Seeders;

use App\Models\Condition;
use App\Models\Product;
use App\Models\Storage;
use Illuminate\Database\Seeder;

class ProductPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Product::all() as $product) {
            $storages = $product->storages()->get()->pluck('id');
            $conditions = Condition::all();
            foreach ($storages as $storage) {
                $conditions->each(function ($item) use ($storage, $product) {
                    $item->storages()->attach($storage, ['product_id' => $product->id, 'price' => rand(10, 50)]);
                });
            }
        }
    }
}
