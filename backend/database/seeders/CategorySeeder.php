<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [
            'Apple', 'Samsung', 'Nokia',
        ];

        foreach ($titles as $title) {
            Category::updateOrCreate([
                'title' => $title
            ], []);
        }
    }
}
