<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name','location','phone','bank_account','notes'];

    public function imports()
    {
        return $this->hasMany(Import::class);
    }

    public function cheques()
    {
        return $this->hasMany(Cheque::class);
    }
}
