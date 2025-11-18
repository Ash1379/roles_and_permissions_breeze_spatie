<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $fillable = [
        'company_id', 'driver_id', 'product_id', 'reservoir_id',
        'quantity', 'price', 'total'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function reservoir()
    {
        return $this->belongsTo(Reservoir::class);
    }
}
.
