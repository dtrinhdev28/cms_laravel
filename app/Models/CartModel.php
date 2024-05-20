<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_product',
        'price',
        'quantity',
        'total'
    ];

    protected $table = 'cart';
    protected $primaryKey = 'cart';
}
