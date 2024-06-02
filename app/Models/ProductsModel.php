<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id_product';

    protected $fillable = [
        'id_product',
        'name',
        'slug',
        'price',
        'price_promotion',
        'stock',
        'views',
        'description',
        'special',
        'hidden',
        'created_at',
        'updated_at',
        'category_id',
        'id_images',
        'image',
    ];

}
