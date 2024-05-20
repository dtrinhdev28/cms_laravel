<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewersModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_product'
    ];
    protected $table = "viewer";
    protected $primaryKey = "id_viewer";
}
