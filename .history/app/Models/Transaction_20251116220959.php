<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Transaction extends Model
{
    protected $fillable = [
        'type', 'reference_id', 'amount', 'transaction_date', 'notes'
    ];

    // ارتباط با انواع مدل‌ها
    public function reference()
    {
        return $this->morphTo();
    }
}
