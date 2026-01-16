<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PositionSeeder::class,
            ComfortCategorySeeder::class,
            PositionComfortCategorySeeder::class,
            CarModelSeeder::class,
            DriverSeeder::class,
            CarSeeder::class,
        ]);
    }
}
