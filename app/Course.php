<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $table = 'course';
    
    protected $fillable = [
        'name', 'coordinator', 'status'
    ];

    public function getWorks()
    {
    	return $this->hasMany('App\Work');
    }
}
