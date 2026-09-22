<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'product_code',
        'name',
        'slug',
        'category_id',
        'price',
        'image',
        'short_description',
        'description',
        'display_order',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'status' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getFrontendUrlAttribute(): string
    {
        return route('products.show', $this->slug);
    }
}