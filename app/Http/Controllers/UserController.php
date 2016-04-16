<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Validator;
use Redirect;
use Session;

class UserController extends Controller
{
	private $user;

	public function __construct()
	{
		$this->user = new User;
	}

    public function saveUsers(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
    	]);

    	if ($validator->fails()) { 
    		//dd($validator);
    		Redirect::to('/cadastrar')->with('message', $validator->messages->messages);
    	}

		$this->user->name     = $request['name'];
		$this->user->email    = $request['email'];
		$this->user->password = bcrypt($request['password']);

		$this->user->save();

		Session::flash('message', 'Usuário cadastrado com sucesso!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin');
    }

}
