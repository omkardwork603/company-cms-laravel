<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'designation',
        'department',
        'email',
        'phone',
        'bio',
        'profile_image',
        'linkedin_url',
        'twitter_url',
        'facebook_url',
        'display_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function getFrontendUrlAttribute(): string
    {
        return route('team.show', $this->id);
    }
}