<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [
            'Brand New', 'Great Condition', 'Used condition', 'Dead',
        ];

        foreach ($titles as $title) {
            Condition::updateOrCreate([
                'title' => $title,
            ], []);
        }
    }
}
