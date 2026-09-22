<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured_image',
        'status',
    ];

    public function getFrontendUrlAttribute(): string
    {
        if ($this->slug === 'home') {
            return url('/');
        }
        if ($this->slug === 'about') {
            return url('/about');
        }
        return url('/pages/' . $this->slug);
    }
}