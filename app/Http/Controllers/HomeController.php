<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Session;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pendentes');
    }

    public function createUsers()
    {
        return view('admin.register');
    }

    public function usersManagement()
    {   
        $user = Auth::user();

        if ($user['attributes']['role'] == 1) {
            
            $data = [
                'users' => User::all()
            ];
            
            return view('admin.gerenciarusuarios', $data);            
        }

        abort(404); 

    }

    public function editUser($userId)
    {
        $data = [
            'users' => User::find($userId)
        ];

        if (Auth::user()->id != $userId) {
            return view('admin.editarusuarios', $data);
        }

        return view('admin.editarusuario', $data);
            
    }
}
