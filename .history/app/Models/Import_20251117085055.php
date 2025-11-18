<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Import extends Model
{
    protected $fillable = [
        'company_id','driver_id','product_id',
        'litres','value','serial_no','imported_at','notes'
    ];

    // اضافه کردن cast برای imported_at
    protected $casts = [
        'imported_at' => 'datetime',  // حالا به Carbon تبدیل می‌شود
    ];

    public function company() { return $this->belongsTo(Company::class); }
    public function driver()  { return $this->belongsTo(Driver::class); }
    public function product() { return $this->belongsTo(Product::class); }
}
