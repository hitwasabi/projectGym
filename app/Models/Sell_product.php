<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell_product extends Model
{
    use HasFactory;
    protected $primaryKey = 'sp_id';
    protected $fillable = ['product_id','prices'];
}
