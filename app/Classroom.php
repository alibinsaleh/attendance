<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    
	protected $fillable = [
		'classroom_num',
		'name',
		'course_id',
		'slug',
		'max_size'

	];

	public function courses()
	{
		return $this->belongsToMany('App\Course');
	}

	public function course()
	{
		return $this->belongsTo('App\Course');
	}

	public function teachers()
	{
		return $this->hasManyThrough('App\Teacher', 'App\Course', 'id', 'id');
	}

	
    
}
