<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// hi

class News extends Model
{
    protected $fillable = [
        'sourceId', 
        'sourceName', 
        'author',
        'title',
        'description',
        'url',
        'urlToImage',
        'publishedAt',
        'content',
    ];
}
