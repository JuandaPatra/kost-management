<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'house_id',
        'price',
        'lantai',
        'is_booked'
    ];

    public function House()
    {
        return $this->belongsTo(House::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }


}
