<?php

namespace App\Actions;

use App\Models\User;
use App\Repositories\Contracts\CarRepositoryInterface;
use DateTimeInterface;
use Illuminate\Support\Collection;

class GetAvailableCarsAction
{
    public function __construct(
        private readonly CarRepositoryInterface $carRepository
    ) {
    }

    public function __invoke(
        User $user,
        DateTimeInterface $startTime,
        DateTimeInterface $endTime,
        ?int $carModelId = null,
        ?int $comfortCategoryId = null
    ): Collection {
        return $this->carRepository->getAvailableCarsForUser(
            $user,
            $startTime,
            $endTime,
            $carModelId,
            $comfortCategoryId
        );
    }
}

