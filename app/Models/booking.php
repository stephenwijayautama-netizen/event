<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $fillable = [
        'booking_id',
        'event_id',
        'name',
        'email',
        'phone',
        'seat',
    ];

    public function event()
    {
        return $this->belongsTo(event::class);
    }
}
