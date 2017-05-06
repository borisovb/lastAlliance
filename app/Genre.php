<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    public function genres()
    {
        return $this->belongsToMany('App\Project', 'project_genres');
    }

}