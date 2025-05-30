<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourit_Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'session_ID'
    ];
}
