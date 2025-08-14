<?php

namespace App\Models;

use Database\Factories\MealFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $validated)
 */
class Meal extends Model
{
    /** @use HasFactory<MealFactory> */
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
}
