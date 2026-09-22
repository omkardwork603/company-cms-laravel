<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'site_tagline',
        'details',
        'logo',
        'favicon',
        'hero_image',

        'contact_email',
        'contact_phone',
        'address',

        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',

        'meta_title',
        'meta_description',
        'google_analytics_id',

        'footer_text',

        'maintenance_mode',
    ];

    protected $casts = [
        'maintenance_mode' => 'boolean',
    ];

    /**
     * Settings is a singleton — there is only ever one row.
     * This returns it, creating an empty one on first use.
     */
    public static function current(): self
    {
        return static::query()->firstOrCreate([]);
    }
}
