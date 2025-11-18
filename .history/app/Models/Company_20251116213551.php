<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'phone', 'address'];

    public function imports()
    {
        return $this->hasMany(Import::class);
    }
}

