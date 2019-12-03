<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'content', 'author_id', 'category_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'article_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    
}
