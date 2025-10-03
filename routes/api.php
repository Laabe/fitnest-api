<?php

use App\Http\Controllers\MealController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::middleware('auth:sanctum')->group(function () {
    // Get authenticated user
    Route::get('/user', fn (Request $request) => $request->user());
    Route::apiResource('meal-plans', MealPlanController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('meals', MealController::class);
    Route::apiResource('users', UserController::class);
    Route::put('/settings/profile', [UserController::class, 'updateMyProfile']);
});
