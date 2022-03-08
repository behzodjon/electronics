<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
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
        $titles = [
            'iPhone6', 'iPhone6S', 'iPhone6S Plus', 'iPhone7', 'iPhone7 Plus', 'iPhone8', 'iPhone8 Plus', 'iPhone X',
            'iPhone SE 2020', 'iPhone XS', 'iPhone XS Max', 'iPhone11', 'iPhone11 Pro', 'iPhone12', 'iPhone12 Mini',
            'iPhone12 Pro', 'iPhone12 Pro Max', 'iPhone12 Pro Max', 'iPhone13'
        ];

        foreach ($titles as $title) {
            $product = Product::updateOrCreate([
                'title' => $title,
                'category_id' => 1,
            ], []);
            $product->storages()->sync([1, 2, 4]);
        }
    }
}
