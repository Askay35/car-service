<?php

namespace App\Http\Controllers\Api;

use App\Actions\GetAvailableCarsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetAvailableCarsRequest;
use App\Http\Resources\CarResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AvailableCarsController extends Controller
{
    public function __invoke(
        GetAvailableCarsRequest $request,
        GetAvailableCarsAction $action
    ): AnonymousResourceCollection {
        $cars = $action(
            $request->user(),
            Carbon::parse($request->validated('start_time')),
            Carbon::parse($request->validated('end_time')),
            $request->validated('car_model_id'),
            $request->validated('comfort_category_id')
        );

        return CarResource::collection($cars);
    }
}

