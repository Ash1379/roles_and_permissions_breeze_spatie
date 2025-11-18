<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['first_name','last_name','phone','photo','description'];

    public function lends(){ return $this->hasMany(Lend::class); }
    public function payments(){ return $this->hasMany(Payment::class); }
    public function sales(){ return $this->hasMany(Sale::class); }
    public function cheques(){ return $this->hasMany(Cheque::class); }

    public function totalLent(){ return $this->lends()->sum('quantity'); }
    public function totalPaid(){ return $this->payments()->sum('amount'); }
    public function outstanding(){ return $this->totalLent() - $this->totalPaid(); }
}
