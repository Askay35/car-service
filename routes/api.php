<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AvailableCarsController;
use App\Http\Controllers\Api\CarModelController;
use App\Http\Controllers\Api\ComfortCategoryController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', UserController::class);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/positions', PositionController::class);
    Route::get('/comfort-categories', ComfortCategoryController::class);
    Route::get('/car-models', CarModelController::class);

    Route::get('/cars/available', AvailableCarsController::class)->name('cars.available');
});
