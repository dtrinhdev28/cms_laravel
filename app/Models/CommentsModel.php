<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
    use HasFactory;
    protected $table = 'binhluan';
    protected $primaryKey = 'id';

    public function blog()
    {
        return $this->belongsTo(BlogModel::class);
    }
}
