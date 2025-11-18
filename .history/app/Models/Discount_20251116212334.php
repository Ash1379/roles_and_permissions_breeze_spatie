<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model {
    use HasFactory;
    protected $fillable = ['user_id','name','amount','percent','notes'];
    public function user(){ return $this->belongsTo(\App\Models\User::class); }
}
..
