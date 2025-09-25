<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'sku',
        'category_id',
        'price',
        'status',
        'stock_quantity',
        'images',
        'variants',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
