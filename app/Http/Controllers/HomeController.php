<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Invite;
use App\Work;
use App\Course;
use Validator;
use Session;
use Auth;
use Mail;

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
        $user = Auth::user();
        $data = [
            'works'  => Work::where('status', 0)->get(),
            'logged' => $user['attributes']['id']
        ];

        return view('admin.pendentes', $data);
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

    public function inviteUser()
    {
        return view('admin.invite');
    }

    public function sendEmail(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'email'    => 'required|email|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('convidar')
                    ->with('message', 'Erro ao convidar o usuário. Por favor tente novamente')
                    ->with('alert-class', 'alert-warning')
                    ->with('errors', $validator->errors());
        }

        $invite = new Invite;
        $token = $invite->createToken();

        $invite->token  = $token;
        $invite->email  = $data['email'];
        $invite->save();

        $data['link']    = url('/').'/uploadfile/'.$token;
        $data['message'] = "Olá, segue o link para fazer o upload do seu trabalho: ".$data['link'];

        Mail::raw($data['message'], function($message) use ($data)
        {
            $message->from('vtr.gomes@hotmail.com', 'Victor Gazotti');
            $message->to($data['email'])->subject('Link para upload de TCC');
        });

        return redirect('convidar')
                        ->with('message', 'Email enviado com sucesso!')
                        ->with('alert-class', 'alert-success');

    }

    public function reproved()
    {
        $data = [
            'works' => Work::with('user')->where('status', 2)->get()
        ];

        return view('admin.reprovados', $data);
    }

    public function approved()
    {
        $data = [
            'works' => Work::with('user')->where('status', 1)->get()
        ];

        return view('admin.trabalhosaprovados', $data);
    }

    public function updateCourse($courseId)
    {   
        $data = [
            'course' => Course::find($courseId)
        ];

        if (Auth::user()) {
            return view('admin.editarcurso', $data);
        }

        abort(404);
    }
}
