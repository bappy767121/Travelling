<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogSection extends Model
{
    protected $table = 'blog_sections';
    public function blog()
    {
        return $this->belongsTo(BlogSection::class, 'section_id', 'id');
    }
}
