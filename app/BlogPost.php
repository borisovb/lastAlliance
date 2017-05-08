<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public function owner()
    {
        return $this->belongsTo('App\User', 'author');
    }
}
