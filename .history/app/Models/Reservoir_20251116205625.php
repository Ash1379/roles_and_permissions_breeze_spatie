<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservoir extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','name','capacity_litre','current_litre','location','notes'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
