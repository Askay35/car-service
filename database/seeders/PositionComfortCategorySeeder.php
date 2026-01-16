<?php

namespace Database\Seeders;

use App\Models\ComfortCategory;
use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionComfortCategorySeeder extends Seeder
{
    public function run(): void
    {
        $director = Position::where('name', 'Директор')->first();
        $deputyDirector = Position::where('name', 'Заместитель директора')->first();
        $manager = Position::where('name', 'Менеджер')->first();
        $seniorSpecialist = Position::where('name', 'Старший специалист')->first();
        $specialist = Position::where('name', 'Специалист')->first();
        $assistant = Position::where('name', 'Ассистент')->first();

        $category1 = ComfortCategory::where('level', 1)->first();
        $category2 = ComfortCategory::where('level', 2)->first();
        $category3 = ComfortCategory::where('level', 3)->first();
        $category4 = ComfortCategory::where('level', 4)->first();

        if ($director && $category1 && $category2 && $category3) {
            $director->comfortCategories()->sync([$category1->id, $category2->id, $category3->id]);
        }

        if ($deputyDirector && $category1 && $category2) {
            $deputyDirector->comfortCategories()->sync([$category1->id, $category2->id]);
        }

        if ($manager && $category2 && $category3) {
            $manager->comfortCategories()->sync([$category2->id, $category3->id]);
        }

        if ($seniorSpecialist && $category3) {
            $seniorSpecialist->comfortCategories()->sync([$category3->id]);
        }

        if ($specialist && $category3 && $category4) {
            $specialist->comfortCategories()->sync([$category3->id, $category4->id]);
        }

        if ($assistant && $category4) {
            $assistant->comfortCategories()->sync([$category4->id]);
        }
    }
}

