<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'invoiceId',
        'house_id',
        'room_id',
        'status_payment',
        'date_start',
        'date_end',
        'price',

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    function house() 
    {
     return $this->belongsTo(House::class);   
    }
    
    function room()
    {
        return $this->belongsTo(Room::class);
    }
}
