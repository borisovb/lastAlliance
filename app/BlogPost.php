<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = ['title', 'content'];

    public function owner()
    {
        return $this->belongsTo('App\User', 'author');
    }
}
