<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrayImageModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'image',
        'id_product'
    ];

    protected $table = 'image_products';
    protected $primaryKey = 'id';
}
