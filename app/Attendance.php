<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
	protected $fillable = [
		'student_id', 
		'course_id', 
		'checked_day', 
		'checked_month', 
		'checked_year', 
		'week_id', 
		'sunday', 
		'monday', 
		'tuesday', 
		'wednesday', 
		'thursday', 
		'note', 
		'created_at', 
		'updated_at'
	];

	


    public function student()
    {
    	return $this->belongsTo('App\Student');
    }

    public function course()
    {
    	return $this->belongsTo('App\Course');
    }

    public function week()
    {
    	return $this->belongsTo('App\Week');
    }

    


}
