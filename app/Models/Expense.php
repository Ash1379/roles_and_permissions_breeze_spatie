<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'title', 'amount', 'expense_date', 'notes'
    ];

    // Cast expense_date to a date (Carbon instance)
    protected $casts = [
        'expense_date' => 'date',
    ];
}
