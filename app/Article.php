<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'titre', 'contenu', 'author_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

    
}
