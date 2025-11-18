<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    protected $fillable = ['customer_id', 'amount', 'description', 'date'];

    protected $casts = [
        'date' => 'datetime',
    ];

    // A lend belongs to a customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Optional: A lend may have many payments
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
