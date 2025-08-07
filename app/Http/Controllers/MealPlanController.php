<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealPlanRequest;
use App\Http\Requests\UpdateMealPlanRequest;
use App\Http\Resources\MealPlanResource;
use App\Models\MealPlan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class MealPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $mealPlans = MealPlan::all();
        return MealPlanResource::collection($mealPlans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMealPlanRequest $request): MealPlanResource
    {
        $mealPlan = MealPlan::create($request->validated());
        return new MealPlanResource($mealPlan);
    }

    /**
     * Display the specified resource.
     */
    public function show(MealPlan $mealPlan): MealPlanResource
    {
        return new MealPlanResource($mealPlan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMealPlanRequest $request, MealPlan $mealPlan): MealPlanResource
    {
        $mealPlan->update($request->validated());
        return new MealPlanResource($mealPlan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MealPlan $mealPlan): JsonResponse
    {
        $mealPlan->delete();
        return response()->json([
            'message' => 'Meal plan deleted successfully.'
        ], ResponseAlias::HTTP_NO_CONTENT);
    }
}
