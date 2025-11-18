<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'customer_id','product_id','litres','rate','total','sold_at'
    ];

    // اضافه کردن cast برای sold_at
    protected $casts = [
        'sold_at' => 'datetime',  // حالا به Carbon تبدیل می‌شود
    ];

    public function customer() { return $this->belongsTo(Customer::class); }
    public function product()  { return $this->belongsTo(Product::class); }
}
