<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealPlanRequest;
use App\Http\Requests\UpdateMealPlanRequest;
use App\Http\Resources\MealPlanResource;
use App\Models\Meal;
use App\Models\MealPlan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
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
        $payload = $request->validated();
        foreach ($payload['meals'] as $index => $meal) {
            $mealRecipe = Meal::whereIn('id', $meal['recipes'])
                ->get(['id as _id', 'name', 'description', 'image'])
                ->toArray();
            $payload['meals'][$index]['recipes'] = $mealRecipe;
        }

        $mealPlan = MealPlan::create($payload);
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
        $payload = $request->validated();
        foreach ($payload['meals'] as $index => $meal) {
            $mealRecipe = Meal::whereIn('id', $meal['recipes'])
                ->get(['id as _id', 'name', 'description', 'image'])
                ->toArray();
            $payload['meals'][$index]['recipes'] = $mealRecipe;
        }

        $mealPlan->update($payload);
        return new MealPlanResource($mealPlan->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MealPlan $mealPlan): JsonResponse
    {
        $mealPlan->delete();
        return response()->json([
            'message' => 'Meal plan deleted successfully.'
        ], ResponseAlias::HTTP_OK);
    }
}
