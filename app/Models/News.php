<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// hi

class News extends Model
{
    protected $fillable = [
        'source_id', 
        'source_name', 
        'author',
        'title',
        'description',
        'url',
        'url_to_image',
        'published_at',
        'content',
    ];
}
