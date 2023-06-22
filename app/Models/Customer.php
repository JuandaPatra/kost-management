<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'telephone',
        'address',
        'occupation',
        'NIK',
        'status'
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
