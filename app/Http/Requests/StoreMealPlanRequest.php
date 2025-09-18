<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMealPlanRequest extends FormRequest
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
            'photo' => 'nullable|file',
            'snacks' => 'required|array',
            'snacks.included' => 'required|boolean',
            'snacks.price' => 'nullable|numeric|min:0|max:100|required_if:snacks.*.included,true',
            'billingPeriod' => 'required|array',
            'billingPeriod.monthly' => 'required|boolean',
            'billingPeriod.weekly' => 'required|boolean',
            'meals' => 'required|array|min:3|max:3',
            'meals.breakfast' => 'required|array',
            'meals.breakfast.included' => 'required|boolean',
            'meals.breakfast.price' => 'nullable|numeric|min:0|max:100|required_if:meals.breakfast.included,true',
            'meals.breakfast.recipes' => 'nullable|array|required_if:meals.breakfast.included,true',
            'meals.breakfast.recipes.*' => 'uuid|exists:meals,id',
            'meals.lunch' => 'required|array',
            'meals.lunch.included' => 'required|boolean',
            'meals.lunch.price' => 'nullable|numeric|min:0|max:100|required_if:meals.lunch.included,true',
            'meals.lunch.recipes' => 'nullable|array|required_if:meals.lunch.included,true',
            'meals.lunch.recipes.*' => 'uuid|exists:meals,id',
            'meals.dinner' => 'required|array',
            'meals.dinner.included' => 'required|boolean',
            'meals.dinner.price' => 'nullable|numeric|min:0|max:100|required_if:meals.dinner.included,true',
            'meals.dinner.recipes' => 'nullable|array|required_if:meals.dinner.included,true',
            'meals.dinner.recipes.*' => 'uuid|exists:meals,id',
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
            'snacks.required' => 'Please specify if snacks are included in the meal plan.',
            'snacks.*.included.required' => 'Please specify if snacks are included in the meal plan.',
            'snacks.*.included.boolean' => 'The snacks.included field must be true or false.',
            'snacks.*.price.required_if' => 'Please provide a price for snacks if they are included.',
            'snacks.*.price.numeric' => 'The snacks price must be a numeric value.',
            'snacks.*.price.min' => 'The snacks price must be at least 0.',
            'snacks.*.price.max' => 'The snacks price cannot exceed 100.',
            'billingPeriod.required' => 'Please specify the billing period for the meal plan.',
            'billingPeriod.monthly.required' => 'Please specify if monthly billing is available.',
            'billingPeriod.monthly.boolean' => 'The billingPeriod.monthly field must be true or false.',
            'billingPeriod.weekly.required' => 'Please specify if weekly billing is available.',
            'billingPeriod.weekly.boolean' => 'The billingPeriod.weekly field must be true or false.',
            'meals.required' => 'Please provide meal details for breakfast, lunch, and dinner.',
            'meals.min' => 'The meal plan must include breakfast, lunch, and dinner.',
            'meals.max' => 'The meal plan can only include breakfast, lunch, and dinner.',
            'meals.breakfast.required' => 'Please provide details for breakfast.',
            'meals.breakfast.included.required' => 'Please specify if breakfast is included in the meal plan.',
            'meals.breakfast.included.boolean' => 'The meals.breakfast.included field must be true or false.',
            'meals.breakfast.price.required_if' => 'Please provide a price for breakfast if it is included.',
            'meals.breakfast.price.numeric' => 'The breakfast price must be a numeric value.',
            'meals.breakfast.price.min' => 'The breakfast price must be at least 0.',
            'meals.breakfast.price.max' => 'The breakfast price cannot exceed 100.',
            'meals.breakfast.recipes.required_if' => 'Please select at least one recipe for breakfast if it is included.',
        ];
    }
}
