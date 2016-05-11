<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Http\Requests;
use Auth;
use Validator;

class CourseController extends Controller
{
    private $course;

    public function __construct()
    {
    	$this->course = new course;
    }

    public function coursesManagement()
    {   
        $user = Auth::user();

        if ($user['attributes']['role'] == 1) {
            
            $data = [
                'courses' => Course::all()
            ];
            
            return view('admin.gerenciarcursos', $data);
        }

        abort(404); 
    }

    public function createCourse()
    {
    	if (Auth::user()->role == 1) {
    		return view('admin.cadastrarcursos');
    	}

    	abort(404);
    }

    public function saveCourse(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'name'     		 => 'required|max:255',
            'coordinator'    => 'required|max:255',
    	]);

    	if ($validator->fails()) {
    		return redirect('cadastrar-curso')
    						->with('message', 'Erro ao cadastrar o curso. Por favor tente novamente')
    						->with('alert-class', 'alert-warning')
    						->with('errors', $validator->errors());
    	}

		$this->user->name     = $request['name'];
		$this->user->email    = $request['email'];
		$this->user->password = bcrypt($request['password']);
		$this->user->role     = empty($request['role'] ? 0 : 1);

		$this->user->save();

        return redirect('admin')
        				->with('message', 'Curso cadastrado com sucesso!')
    					->with('alert-class', 'alert-success');
    }
}
