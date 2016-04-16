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
    		'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
    	]);

    	if ($validator->fails()) {
    		return redirect('cadastrar')
    						->with('message', 'Erro ao cadastrar o usuário. Por favor tente novamente')
    						->with('alert-class', 'alert-warning')
    						->with('errors', $validator->errors());
    	}

		$this->user->name     = $request['name'];
		$this->user->email    = $request['email'];
		$this->user->password = bcrypt($request['password']);
		//$this->user->role     = $request['password'];

		$this->user->save();

        return redirect('admin')
        				->with('message', 'Usuário cadastrado com sucesso!')
    					->with('alert-class', 'alert-success');
    }


}
