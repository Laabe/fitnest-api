<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMealPlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'photo' => 'nullable|string|max:255',
            'with_snacks' => 'required|boolean',
            'snack_price' => 'nullable|numeric|min:0|max:100|required_if:with_snacks,true',
            'period' => 'required|string|in:weekly,monthly',
            'meals' => 'required|array|min:1',
            'meals.*.type' => 'required|string|in:breakfast,lunch,dinner,snack',
            'meals.*.price' => 'required|numeric|min:0|max:100',
            'meals.*.recipes' => 'required|array|min:1',
            'meals.*.recipes.*' => 'uuid|exists:meals,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The meal plan must have a name.',
            'name.max' => 'The name cannot be longer than 255 characters.',
            'description.required' => 'Please provide a description for the meal plan.',
            'description.max' => 'The description cannot exceed 2000 characters.',
            'photo.max' => 'The photo URL cannot exceed 255 characters.',
            'with_snacks.required' => 'Please specify if the plan includes snacks.',
            'with_snacks.boolean' => 'The value for with_snacks must be true or false.',
            'snack_price.required_if' => 'The snack price is required when activated.',
            'snack_price.numeric' => 'The snack price must be a number.',
            'snack_price.min' => 'The snack price must be at least 0.',
            'snack_price.max' => 'The snack price may not be greater than 100.',
            'period.required' => 'Please specify the period of the meal plan.',
            'period.in' => 'The period must be either "weekly" or "monthly".',
            'meals.required' => 'You must provide at least one meal.',
            'meals.array' => 'Meals must be provided as an array.',
            'meals.min' => 'Please provide at least one meal.',
            'meals.*.type.required' => 'Each meal must have a type.',
            'meals.*.type.in' => 'Meal type must be one of: breakfast, lunch, dinner, or snack.',
            'meals.*.price.required' => 'Each meal must have a price.',
            'meals.*.price.numeric' => 'The price must be a number.',
            'meals.*.price.min' => 'The price cannot be less than 0.',
            'meals.*.price.max' => 'The price cannot be more than 100.',
            'meals.*.recipes.required' => 'Each meal must include at least one recipe.',
            'meals.*.recipes.array' => 'Recipes must be provided as an array.',
            'meals.*.recipes.min' => 'Please provide at least one recipe for each meal.',
            'meals.*.recipes.*.uuid' => 'Each recipe ID must be a valid UUID.',
            'meals.*.recipes.*.exists' => 'One or more recipe IDs do not exist in the database.',
        ];
    }
}
