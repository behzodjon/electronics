<?php

namespace Database\Seeders;

use App\Models\Storage;
use Illuminate\Database\Seeder;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [
            '16GB', '32GB', '64GB', '128GB','256GB','512GB','1TB',
        ];

        foreach ($titles as $title) {
            Storage::updateOrCreate([
                'title' => $title,
            ], []);
        }
    }
}
