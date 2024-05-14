<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tin';
    public function binhluans()
    {
        return $this->hasMany(CommentsModel::class);
    }
}
