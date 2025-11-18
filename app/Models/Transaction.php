<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'type', 'reference_id', 'amount', 'transaction_date', 'notes'
    ];

    // Cast transaction_date to Carbon
    protected $casts = [
        'transaction_date' => 'datetime',
    ];

    // Polymorphic relation
    public function reference()
    {
        return $this->morphTo();
    }
}
