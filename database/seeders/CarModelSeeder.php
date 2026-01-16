<?php

namespace Database\Seeders;

use App\Models\CarModel;
use App\Models\ComfortCategory;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    public function run(): void
    {
        $category1 = ComfortCategory::where('level', 1)->first();
        $category2 = ComfortCategory::where('level', 2)->first();
        $category3 = ComfortCategory::where('level', 3)->first();
        $category4 = ComfortCategory::where('level', 4)->first();

        $models = [
            ['brand' => 'Mercedes-Benz', 'name' => 'S-Class', 'comfort_category_id' => $category1?->id],
            ['brand' => 'BMW', 'name' => '7 Series', 'comfort_category_id' => $category1?->id],
            ['brand' => 'Audi', 'name' => 'A8', 'comfort_category_id' => $category1?->id],
            ['brand' => 'Mercedes-Benz', 'name' => 'E-Class', 'comfort_category_id' => $category2?->id],
            ['brand' => 'BMW', 'name' => '5 Series', 'comfort_category_id' => $category2?->id],
            ['brand' => 'Audi', 'name' => 'A6', 'comfort_category_id' => $category2?->id],
            ['brand' => 'Toyota', 'name' => 'Camry', 'comfort_category_id' => $category3?->id],
            ['brand' => 'Honda', 'name' => 'Accord', 'comfort_category_id' => $category3?->id],
            ['brand' => 'Volkswagen', 'name' => 'Passat', 'comfort_category_id' => $category3?->id],
            ['brand' => 'Toyota', 'name' => 'Corolla', 'comfort_category_id' => $category4?->id],
            ['brand' => 'Hyundai', 'name' => 'Elantra', 'comfort_category_id' => $category4?->id],
            ['brand' => 'Kia', 'name' => 'Rio', 'comfort_category_id' => $category4?->id],
        ];

        foreach ($models as $model) {
            if ($model['comfort_category_id']) {
                CarModel::create($model);
            }
        }
    }
}

