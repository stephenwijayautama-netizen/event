<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $fillable = [
        'event_id',
        'name_event',
        'date',
        'location',
        'photo',
        'is_available',
        'seat',

    ];

    public function bookings()
    {
        return $this->hasMany(booking::class);
    }
}
