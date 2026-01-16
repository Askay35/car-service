<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PositionResource;
use App\Models\Position;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PositionController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        $positions = Position::orderBy('id')->get();

        return PositionResource::collection($positions);
    }
}

