<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_for_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'Order_Info_Id',
        'Quantity',
        'TotalPrice'
    ];
}
