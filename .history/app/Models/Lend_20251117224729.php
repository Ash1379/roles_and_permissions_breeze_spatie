<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    protected $fillable = ['customer_id', 'amount', 'description', 'date'];

    // Add this to cast 'date' as Carbon
  protected $casts = [
    'transaction_date' => 'datetime', // <-- add this
];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Lend extends Model
{
    protected $fillable = [
        'customer_id',
        'amount',
        'created_at',
        'updated_at',
        // other fields
    ];

    // Option 1: Laravel 12+ casting
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
