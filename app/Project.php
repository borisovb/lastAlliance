<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'title_bg', 'poster', 'banner', 'year',
                            'duration', 'episodesNum', 'description',
                            'producer', 'anidb', 'mal', 'ann'];

    public function translators()
    {
        return $this->belongsToMany('App\Member', 'project_translators');
    }

    public function editors()
    {
        return $this->belongsToMany('App\Member', 'project_editors');
    }

    public function encoders()
    {
        return $this->belongsToMany('App\Member', 'project_encoders');
    }

    public function karaokeMakers()
    {
        return $this->belongsToMany('App\Member', 'project_karaoke');
    }

    public function typeseters()
    {
        return $this->belongsToMany('App\Member', 'project_typeset');
    }

    public function stylers()
    {
        return $this->belongsToMany('App\Member', 'project_style');
    }

    public function qualityControl()
    {
        return $this->belongsToMany('App\Member', 'project_quality_control');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'project_genres');
    }

    public function types()
    {
        return $this->belongsToMany('App\Type', 'project_types');
    }

    public function episodes()
    {
        return $this->hasMany('App\Episode');
    }


}
