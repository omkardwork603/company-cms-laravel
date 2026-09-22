<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'image',
        'short_description',
        'description',
        'display_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function getFrontendUrlAttribute(): string
    {
        return route('services.show', $this->slug);
    }
}
