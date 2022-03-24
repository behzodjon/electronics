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
        // $titles = [
        //     'iPhone6', 'iPhone6S', 'iPhone6S Plus', 'iPhone7', 'iPhone7 Plus', 'iPhone8', 'iPhone8 Plus', 'iPhone X',
        //     'iPhone SE 2020', 'iPhone XS', 'iPhone XS Max', 'iPhone11', 'iPhone11 Pro', 'iPhone12', 'iPhone12 Mini',
        //     'iPhone12 Pro', 'iPhone12 Pro Max', 'iPhone12 Pro Max', 'iPhone13'
        // ];

        foreach ($products as $product) {
            $a = [1, 2, 3, 4, 5, 6, 7];
            $random_arr = Arr::random($a, 3);
            $product->storages()->sync($random_arr);
        }
    }
}
