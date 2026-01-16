<?php

namespace App\Repositories;

use App\Models\Car;
use App\Models\User;
use App\Repositories\Contracts\CarRepositoryInterface;
use DateTimeInterface;
use Illuminate\Support\Collection;

class CarRepository implements CarRepositoryInterface
{
    public function getAvailableCarsForUser(
        User $user,
        DateTimeInterface $startTime,
        DateTimeInterface $endTime,
        ?int $carModelId = null,
        ?int $comfortCategoryId = null
    ): Collection {
        $allowedCategoryIds = $user->position?->comfortCategories()->pluck('comfort_categories.id') ?? collect();

        if ($allowedCategoryIds->isEmpty()) {
            return collect();
        }

        return Car::query()
            ->with(['carModel.comfortCategory', 'driver'])
            ->where('is_active', true)
            ->whereHas('carModel', function ($query) use ($allowedCategoryIds, $carModelId, $comfortCategoryId) {
                $query->whereIn('comfort_category_id', $allowedCategoryIds);

                if ($carModelId !== null) {
                    $query->where('id', $carModelId);
                }

                if ($comfortCategoryId !== null) {
                    $query->where('comfort_category_id', $comfortCategoryId);
                }
            })
            ->whereDoesntHave('bookings', function ($query) use ($startTime, $endTime) {
                $query->where(function ($q) use ($startTime, $endTime) {
                    $q->where('start_time', '<', $endTime)
                      ->where('end_time', '>', $startTime);
                });
            })
            ->get();
    }
}

