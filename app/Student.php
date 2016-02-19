<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
    	'academic_num',
    	'name',
    	'slug',
    	'registared_at',
    	'email',
    	'nationality'

    ];


    public function courses()
    {
        return $this->belongsToMany('App\Course')->withTimestamps();
    }

    
    public function attendances()
    {
    	return $this->belongsToMany('App\Attendance', 'attendances');
    }

    
}
