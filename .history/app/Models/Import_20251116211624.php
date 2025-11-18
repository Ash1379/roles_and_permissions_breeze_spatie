<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Import extends Model {
    use HasFactory;
    protected $fillable = ['company_id','driver_id','reservoir_id','product_type','litres','serial_no','value','imported_at','notes'];

    public function company(){ return $this->belongsTo(Company::class); }
    public function driver(){ return $this->belongsTo(Driver::class); }
    public function reservoir(){ return $this->belongsTo(Reservoir::class); }
    public function sales(){ return $this->hasMany(Sale::class); }
}
