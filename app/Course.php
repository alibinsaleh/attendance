<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    protected $fillable = [
    	'name',
    	'slug'
    ];

    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }

    public function classrooms()
    {
    	return $this->belongsToMany('App\Classroom')->withTimestamps();
    }

    public function teachers()
    {
    	return $this->belongsToMany('App\Teacher');
    }
    public function teacher()
    {
        return $this->hasOne('App\Teacher');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }
}
