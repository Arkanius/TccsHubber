<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Validator;
use Redirect;
use Session;
use Auth;

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
		$this->user->role     = empty($request['role'] ? 0 : 1);

		$this->user->save();

        return redirect('admin')
        				->with('message', 'Usuário cadastrado com sucesso!')
    					->with('alert-class', 'alert-success');
    }

    public function deleteUser(Request $request)
    {
    	$id = $request['user_id'];

    	$users = $this->user->where(['id' => $id])->delete();

    	echo json_encode($users);
    }

    public function editUser(Request $request)
    {
        if (Auth::user()->role != 1) {
            
            $pageRedirect = 'admin';

            if (Auth::user()->id != $request['user_id']) {
                return redirect('admin')
                        ->with('message', 'Erro ao editar usuário!')
                        ->with('alert-class', 'alert-warning');
            }
        } else {
            $pageRedirect = 'gerenciar-usuarios';
        }

        $id = $request['user_id'];

        if (!empty($request['password'])) {
            $users = $this->user->where(['id' => $id])
                        ->update(['name'    => $request['name'], 
                                 'email'    => $request['email'],
                                 'role'     => $request['role'],
                                 'password' => bcrypt($request['password'])]);
        } else {
            $users = $this->user->where(['id' => $id])
                                ->update(['name' => $request['name'], 
                                         'email' => $request['email'],
                                         'role'  => $request['role']]);            
        }


        return redirect($pageRedirect)
                        ->with('message', 'Usuário atualizado com sucesso!')
                        ->with('alert-class', 'alert-success');

    }


}
