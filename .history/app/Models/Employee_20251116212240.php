<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model {
    use HasFactory;
    protected $fillable = ['user_id','name','position','phone','notes'];

    public function user(){ return $this->belongsTo(\App\Models\User::class); }
}
..
