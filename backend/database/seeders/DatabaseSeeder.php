<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\StorageSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\ConditionSeeder;
use Database\Seeders\ProductPriceSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            StorageSeeder::class,
            ConditionSeeder::class,
            CountriesTableSeeder::class,
            AdminUserSeeder::class
        ]);
    }
}
