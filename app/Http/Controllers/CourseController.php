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

		$this->course->name           = $request['name'];
		$this->course->coordinator    = $request['coordinator'];
		$this->course->status         = 1;

		$this->course->save();

        return redirect('gerenciar-cursos')
        				->with('message', 'Curso cadastrado com sucesso!')
    					->with('alert-class', 'alert-success');
    }

    public function deleteUser(Request $request)
    {
        if (Auth::user()) {
            $id = $request['resource_id'];

            if ($this->course->where(['id' => $id])->update(['status' => 0])) {
                echo json_encode(1);
                return;
            }
            
            echo json_encode(0);
        }
        
        return;          
    }

    public function updateCourse(Request $request)
    {   
        if (Auth::user()) {

            $validator = Validator::make($request->all(), [
                'name'           => 'required|max:255',
                'coordinator'    => 'required|max:255',
            ]);

            $pageRedirect = 'gerenciar-cursos';
            $id           = $request['course_id'];

            $update = [
                'name'        => $request['name'],
                'coordinator' => $request['coordinator'],
            ];

            if ($request['status'] == 1) {
                $update['status'] = 1;
            }
     
            $this->course->where(['id' => $id])->update($update);

            return redirect($pageRedirect)
                    ->with('message', 'Curso atualizado com sucesso!')
                    ->with('alert-class', 'alert-success');
        }

        abort(404);
    }
   
}
