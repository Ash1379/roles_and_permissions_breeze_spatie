<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    protected $fillable = ['customer_id', 'amount', 'description', 'date'];

    // Add this to cast 'date' as Carbon
    protected $casts = [
        'date' => 'datetime:Y-m-d', // now $lend->date->format('d M, Y') works
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
