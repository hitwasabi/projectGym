<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'orderDt_id';
    protected $table = 'order_details';
    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];
}
