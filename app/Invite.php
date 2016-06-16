<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $table = 'invites';

    public function createToken()
    {
    	return str_random(50);
    }

    public function validateToken($token)
    {
    	return $this->where(['token' => $token])->get();
    }
}
