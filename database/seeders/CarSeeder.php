<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\Driver;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $drivers = Driver::all();
        $models = CarModel::all();

        if ($drivers->isEmpty() || $models->isEmpty()) {
            return;
        }

        $cars = [
            ['car_model_id' => $models->where('name', 'S-Class')->first()?->id, 'driver_id' => $drivers->get(0)?->id, 'license_plate' => 'А001АА777', 'year' => 2023, 'color' => 'Черный'],
            ['car_model_id' => $models->where('name', '7 Series')->first()?->id, 'driver_id' => $drivers->get(1)?->id, 'license_plate' => 'В002ВВ777', 'year' => 2023, 'color' => 'Белый'],
            ['car_model_id' => $models->where('name', 'A8')->first()?->id, 'driver_id' => $drivers->get(2)?->id, 'license_plate' => 'С003СС777', 'year' => 2022, 'color' => 'Серебристый'],
            ['car_model_id' => $models->where('name', 'E-Class')->first()?->id, 'driver_id' => $drivers->get(3)?->id, 'license_plate' => 'Д004ДД777', 'year' => 2023, 'color' => 'Синий'],
            ['car_model_id' => $models->where('name', '5 Series')->first()?->id, 'driver_id' => $drivers->get(4)?->id, 'license_plate' => 'Е005ЕЕ777', 'year' => 2022, 'color' => 'Черный'],
            ['car_model_id' => $models->where('name', 'A6')->first()?->id, 'driver_id' => $drivers->get(5)?->id, 'license_plate' => 'Ж006ЖЖ777', 'year' => 2023, 'color' => 'Белый'],
            ['car_model_id' => $models->where('name', 'Camry')->first()?->id, 'driver_id' => $drivers->get(6)?->id, 'license_plate' => 'З007ЗЗ777', 'year' => 2022, 'color' => 'Серый'],
            ['car_model_id' => $models->where('name', 'Accord')->first()?->id, 'driver_id' => $drivers->get(7)?->id, 'license_plate' => 'И008ИИ777', 'year' => 2023, 'color' => 'Красный'],
            ['car_model_id' => $models->where('name', 'Passat')->first()?->id, 'driver_id' => $drivers->get(8)?->id, 'license_plate' => 'К009КК777', 'year' => 2022, 'color' => 'Синий'],
            ['car_model_id' => $models->where('name', 'Corolla')->first()?->id, 'driver_id' => $drivers->get(9)?->id, 'license_plate' => 'Л010ЛЛ777', 'year' => 2023, 'color' => 'Белый'],
            ['car_model_id' => $models->where('name', 'Elantra')->first()?->id, 'driver_id' => $drivers->get(10)?->id, 'license_plate' => 'М011ММ777', 'year' => 2022, 'color' => 'Черный'],
            ['car_model_id' => $models->where('name', 'Rio')->first()?->id, 'driver_id' => $drivers->get(11)?->id, 'license_plate' => 'Н012НН777', 'year' => 2023, 'color' => 'Серебристый'],
        ];

        foreach ($cars as $car) {
            if ($car['car_model_id'] && $car['driver_id']) {
                Car::create([
                    'car_model_id' => $car['car_model_id'],
                    'driver_id' => $car['driver_id'],
                    'license_plate' => $car['license_plate'],
                    'year' => $car['year'],
                    'color' => $car['color'],
                    'is_active' => true,
                ]);
            }
        }
    }
}

