<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use DateTimeInterface;
use Illuminate\Support\Collection;

interface CarRepositoryInterface
{
    public function getAvailableCarsForUser(
        User $user,
        DateTimeInterface $startTime,
        DateTimeInterface $endTime,
        ?int $carModelId = null,
        ?int $comfortCategoryId = null
    ): Collection;
}

