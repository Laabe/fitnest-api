<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource(
    'meal-plans',
    App\Http\Controllers\MealPlanController::class
)->middleware('auth:sanctum');
