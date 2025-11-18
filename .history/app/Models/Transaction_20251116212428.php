<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model {
    use HasFactory;
    protected $fillable = ['customer_id','sale_id','import_id','amount','type','transacted_at','notes'];

    public function customer(){ return $this->belongsTo(Customer::class); }
    public function sale(){ return $this->belongsTo(Sale::class); }
    public function import(){ return $this->belongsTo(Import::class); }
}
