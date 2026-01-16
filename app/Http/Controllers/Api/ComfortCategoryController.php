<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComfortCategoryResource;
use App\Models\ComfortCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ComfortCategoryController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        $categories = ComfortCategory::orderBy('level')
            ->get()
            ->unique('level')
            ->values();

        return ComfortCategoryResource::collection($categories);
    }
}

