<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            ['name' => 'Директор'],
            ['name' => 'Заместитель директора'],
            ['name' => 'Менеджер'],
            ['name' => 'Старший специалист'],
            ['name' => 'Специалист'],
            ['name' => 'Ассистент'],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}

