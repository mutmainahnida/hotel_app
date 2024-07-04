<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name', 'location', 'rating', 'price_per_night', 'image', 'address', 'room_types'
    ];

    protected $casts = [
        'room_types' => 'array',
    ];
}
