<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservoir extends Model
{
    protected $fillable = ['name', 'location', 'capacity'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function imports()
    {
        return $this->hasMany(Import::class);
    }
}
.
