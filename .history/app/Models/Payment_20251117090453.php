<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['customer_id', 'amount', 'method', 'date'];

    // <-- Add this
    protected $casts = [
        'date' => 'datetime:Y-m-d', // now you can safely call ->format()
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
