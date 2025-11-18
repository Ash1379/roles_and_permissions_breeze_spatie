<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'type', 'amount',
        'sale_id', 'payment_id', 'lend_id', 'expense_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

