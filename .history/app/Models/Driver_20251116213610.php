<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'name', 'phone', 'license_number', 'address', 'description'
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function imports()
    {
        return $this->hasMany(Import::class);
    }
}

