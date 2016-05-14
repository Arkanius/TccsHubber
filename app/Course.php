<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{   
    protected $fillable = [
        'name', 'coordinator', 'status'
    ];

    public function getWorks()
    {
    	return $this->hasMany('App\Work');
    }
}
