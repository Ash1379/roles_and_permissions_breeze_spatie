<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'phone', 'address'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function lends()
    {
        return $this->hasMany(Lend::class);
    }

    public function cheques()
    {
        return $this->hasMany(Cheque::class);
    }
}
.
