<?php

namespace App\Models;

use Database\Factories\MealPlanFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class MealPlan extends Model
{
    /** @use HasFactory<MealPlanFactory> */
    use HasFactory, HasUuids, HasApiTokens;

    protected $guarded = ['id'];
}
