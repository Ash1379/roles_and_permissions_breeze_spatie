<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'unit', 'price', 'description'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function imports()
    {
        return $this->hasMany(Import::class);
    }
}
