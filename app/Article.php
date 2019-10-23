<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'titre', 'contenu', 'author_id',
    ];

    public function author_id()
    {
        return $this->belongsTo('App\User');
    }

    
}
