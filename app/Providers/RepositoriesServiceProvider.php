<?php

namespace App\Providers;

use App\Repositories\CarRepository;
use App\Repositories\Contracts\CarRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CarRepositoryInterface::class => CarRepository::class,
    ];

    public function register(): void
    {
    }

    public function boot(): void
    {
    }
}

