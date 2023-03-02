<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'cart_id';
    protected $fillable = ['user_id','product_id','flavor_name','quantity'];
    public function products(){
        return $this->belongsTo(Product::class,'product_id','product_id');
    }
}
