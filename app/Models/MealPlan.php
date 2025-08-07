<?php

namespace App\Models;

use Database\Factories\MealPlanFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class MealPlan extends Model
{
    /** @use HasFactory<MealPlanFactory> */
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'name',
        'description',
        'photo',
    ];
}
