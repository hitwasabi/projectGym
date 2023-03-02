<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_id',
        'url',
        'cate_name',
        'product_name',
        'prices',
        'product_code',
        'product_info',
        'info_dt',
    ];

    public function category() {
        return $this->belongsTo(Category::class,'cate_id', 'cate_id');
    }

    public function flavor(){
        return $this->hasMany(Flavor::class,'flavor_id','flavor');
    }
}
