<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function blog()
    {
        return $this->belongsTo(PopulerBlog::class, 'category_id', 'id');
    }
    public function blogs()
    {
        return $this->hasMany(PopulerBlog::class, 'category_id', 'id');
    }
}
