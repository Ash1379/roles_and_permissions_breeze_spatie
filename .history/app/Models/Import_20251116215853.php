<?php
class Import extends Model
{
    protected $fillable = [
        'company_id','driver_id','product_id',
        'litres','value','serial_no','imported_at','notes'
    ];

    public function company() { return $this->belongsTo(Company::class); }
    public function driver()  { return $this->belongsTo(Driver::class); }
    public function product() { return $this->belongsTo(Product::class); }
}


