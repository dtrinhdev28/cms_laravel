<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProductModel extends Model
{
    use HasFactory;
    protected $table = 'image_products';
    protected $primaryKey = 'id';
}
