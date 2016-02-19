<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    protected $fillable = [
    	'name',
    	'from_date',
    	'to_date'
    ];
}
