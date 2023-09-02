<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopulerBlog extends Model
{
    protected $table = 'populer_blogs';
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function section()
    {
        return $this->hasOne(BlogSection::class, 'id', 'section_id');
    }

    public function cat()
    {
        return $this->belongsTo(Category::class, 'id', 'category_id');
    }
}
