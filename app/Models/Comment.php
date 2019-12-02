<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'article_id','author_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }
    public function article()
    {
        return $this->belongsTo('App\Models\Article', 'article_id', 'id');
    }
    
}
