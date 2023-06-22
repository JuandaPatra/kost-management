<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'pic',
        'total_kamar',
    ];

    public function Room()
    {
        return $this->hasMany(Room::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
