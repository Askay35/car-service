<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        $drivers = [
            ['first_name' => 'Иван', 'last_name' => 'Петров', 'phone' => '+7 (999) 111-22-33'],
            ['first_name' => 'Петр', 'last_name' => 'Сидоров', 'phone' => '+7 (999) 222-33-44'],
            ['first_name' => 'Сергей', 'last_name' => 'Иванов', 'phone' => '+7 (999) 333-44-55'],
            ['first_name' => 'Александр', 'last_name' => 'Кузнецов', 'phone' => '+7 (999) 444-55-66'],
            ['first_name' => 'Дмитрий', 'last_name' => 'Смирнов', 'phone' => '+7 (999) 555-66-77'],
            ['first_name' => 'Андрей', 'last_name' => 'Попов', 'phone' => '+7 (999) 666-77-88'],
            ['first_name' => 'Михаил', 'last_name' => 'Соколов', 'phone' => '+7 (999) 777-88-99'],
            ['first_name' => 'Владимир', 'last_name' => 'Лебедев', 'phone' => '+7 (999) 888-99-00'],
            ['first_name' => 'Николай', 'last_name' => 'Козлов', 'phone' => '+7 (999) 999-00-11'],
            ['first_name' => 'Алексей', 'last_name' => 'Новиков', 'phone' => '+7 (999) 000-11-22'],
            ['first_name' => 'Роман', 'last_name' => 'Морозов', 'phone' => '+7 (999) 111-33-44'],
            ['first_name' => 'Олег', 'last_name' => 'Петухов', 'phone' => '+7 (999) 222-44-55'],
        ];

        foreach ($drivers as $driver) {
            Driver::create($driver);
        }
    }
}

