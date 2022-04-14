<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::factory()
            ->count(13)
            ->create();
      
        foreach ($products as $product) {
            $a = [1, 2, 3, 4, 5, 6, 7];
            $random_arr = Arr::random($a, 3);
            $product->storages()->sync($random_arr);
        }
    }
}
