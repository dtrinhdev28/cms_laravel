<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'category';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name_category',
        'hidden',
        'id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $maxOrder = CategoryModel::max('order');
            $model->order = $maxOrder + 1;
        });
    }
}
