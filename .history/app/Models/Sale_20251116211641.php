<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model {
    use HasFactory;
    protected $fillable = ['import_id','customer_id','cashier_id','driver_id','product_type','litres','value','sold_at','notes'];

    public function import(){ return $this->belongsTo(Import::class); }
    public function customer(){ return $this->belongsTo(Customer::class); }
    public function cashier(){ return $this->belongsTo(\App\Models\User::class,'cashier_id'); }
    public function driver(){ return $this->belongsTo(Driver::class); }
}
