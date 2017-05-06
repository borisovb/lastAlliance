<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    public function positions()
    {
        return $this->belongsToMany('App\Position', 'member_positions');
    }

    protected $fillable = ['name', 'avatar'];
}
