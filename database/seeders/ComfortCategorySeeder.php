<?php

namespace Database\Seeders;

use App\Models\ComfortCategory;
use Illuminate\Database\Seeder;

class ComfortCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Первая категория', 'level' => 1],
            ['name' => 'Вторая категория', 'level' => 2],
            ['name' => 'Третья категория', 'level' => 3],
            ['name' => 'Четвертая категория', 'level' => 4],
        ];

        foreach ($categories as $category) {
            ComfortCategory::create($category);
        }
    }
}

