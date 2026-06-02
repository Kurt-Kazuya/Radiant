<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'total_nights',
        'total_price',
        'status',
        'arrival_time',
        'special_requests',
        'preferences',
        'extras',
    ];

    protected $casts = [
        'check_in_date'  => 'date',
        'check_out_date' => 'date',
        'preferences'    => 'array',
        'extras'         => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function scopeOverlapping($query, string $checkIn, string $checkOut)
    {
        return $query->where('check_in_date', '<', $checkOut)
                     ->where('check_out_date', '>', $checkIn);
    }

    public function scopeActive($query)
    {
        return $query->whereIn('status', ['pending', 'confirmed']);
    }
}