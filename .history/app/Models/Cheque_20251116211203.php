<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cheque extends Model {
    use HasFactory;
    protected $fillable = ['company_id','customer_id','amount','cheque_date','status','notes'];
    public function company(){ return $this->belongsTo(Company::class); }
    public function customer(){ return $this->belongsTo(Customer::class); }
}
