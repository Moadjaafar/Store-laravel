<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Info extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'Fist_Name',
        'Last_Name',
        'Phone_number',
        'Email',
        'Address',
        'City',
        'Order_Notes'
    ];
}
