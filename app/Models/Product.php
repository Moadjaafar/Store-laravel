<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'Product_name',
        'Product_short_description',
        'Product_long_description',
        'category_id',
        'category_name',
        'Price',
        'Quantity',
        'Product_Image',
        'Discount',
        'Price_befor_Discount'
    ];
}
