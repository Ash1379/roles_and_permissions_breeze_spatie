<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    protected $fillable = [
        'customer_id', 'cheque_number', 'amount', 'bank', 'due_date'
    ];

    // Cast due_date to a Carbon date object
    protected $casts = [
        'due_date' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
