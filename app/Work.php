<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'theme', 'authors', 'advisor', 'examiners', 'description', 'subject', 'url'
    ];

    public function getCourse()
    {
    	return $this->hasOne('App\Course');
    }

    public function user()
    {
    	return $this->hasOne('App\User', 'id', 'user_approved');
    }
}
