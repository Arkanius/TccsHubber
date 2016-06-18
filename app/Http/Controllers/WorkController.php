<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Validator;
use App\Invite;
use App\Work;
use Mail;
use Illuminate\Support\Facades\Input;

class WorkController extends Controller
{
	private $work;

	public function __construct()
	{
		$this->work = new Work;
	}

    public function resendToken(Request $request)
    {
        $invite = new Invite;

        $data   = $request->all();
        $work   = $this->work->find($data['resource_id']);
        $token  = $invite->createToken();

        $data['email']  = $work->user_email;

        $invite->token  = $token;
        $invite->email  = $data['email'];
        $invite->save();

        $data['link']    = url('/').'/uploadfile/'.$token;
        $data['message'] = "Olá, segue o link para fazer o upload do seu trabalho: ".$data['link'];

        $work->delete();

        $envio = Mail::raw($data['message'], function($message) use ($data) {
            $message->from('vtr.gomes@hotmail.com', 'Victor Gazotti');
            $message->to($data['email'])->subject('Link para upload de TCC');
        });

        return $envio;
    }

    public function manage(Request $request)
    {
    	$action = $request['action'];

    	$work = $this->work->find($request['resource_id']);

    	$work->status = $action;


    	echo json_encode(['message' => $action == 1 ? 'Trabalho aprovado com sucesso!' : 'Trabalho reprovado com sucesso', 
    					  'status' => $work->save()]);
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'email'         => 'required|email',
            'advisor'       => 'required',
            'date'          => 'required',
            'description'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                        ->with('message', 'Erro ao cadastrar o trabalho. Por favor tente novamente')
                        ->with('alert-class', 'alert-warning')
                        ->with('errors', $validator->errors());
        }

        $files  = [
            'image'     => Input::file('authorization'),
            'trabalho'  => Input::file('work')
        ];

        $rules  = [
            'image'     => 'mimes:jpeg,jpg,png,gif|required',
            'trabalho'  => 'required'
        ];
        $validator = Validator::make($files, $rules);        

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        /*
        $rules            = array('work' => 'required');
        $validator        = Validator::make($authorization, $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }
        */

        if (Input::file('authorization')->isValid()) {
            $destinationPath = 'uploads';
            $extension       = Input::file('authorization')->getClientOriginalExtension();
            $fileName        = $this->createFileName($extension);

            Input::file('authorization')->move($destinationPath, $fileName);

            //Session::flash('success', 'Upload successfully');
            return redirect('/');
        }

        

        //validar PDF
        //salvar registro de trabalho em PENDENTES
        //excluir token da tabela de tokens
        //redirect home com mensagem
        
    }

    public function createFileName($extension, $lenght = 10)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lenght).'.'.$extension;
    }
}
