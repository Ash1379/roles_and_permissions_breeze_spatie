<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_type','name','description'];

    // یک محصول می‌تواند چند مخزن داشته باشد
    public function reservoirs()
    {
        return $this->hasMany(Reservoir::class);
    }

    // فروش‌ها بر اساس product_type نگهداری می‌شوند
    public function sales()
    {
        return $this->hasMany(Sale::class, 'product_type', 'product_type');
    }
}
