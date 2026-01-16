<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarModelResource;
use App\Models\CarModel;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarModelController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        $models = CarModel::with('comfortCategory')
            ->orderBy('brand')
            ->orderBy('name')
            ->get();

        return CarModelResource::collection($models);
    }
}

