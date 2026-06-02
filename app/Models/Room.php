<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_number',
        'name',
        'type',
        'price_per_night',
        'status',
        'description',
        'image',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}