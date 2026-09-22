<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'category',
        'short_description',
        'description',
        'featured_image',
        'project_url',
        'display_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function getFrontendUrlAttribute(): string
    {
        return route('projects.show', $this->slug);
    }
}