<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts_products extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'Quantity',
        'Totale_Price'
    ];
}
