<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'location',
        'status',
        'order',
    ];


    protected $casts = [
        'status' => 'boolean',
    ];


    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }
}