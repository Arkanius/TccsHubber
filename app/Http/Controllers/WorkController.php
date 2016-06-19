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
            return redirect()
                    ->back()
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
            'trabalho'  => 'mimes:pdf|required'
        ];
        $validator = Validator::make($files, $rules);        

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        if (Input::file('authorization')->isValid() and Input::file('work')->isValid()) {
            $destinationPath = 'uploads';

            $extensionAuthorization       = Input::file('authorization')->getClientOriginalExtension();
            $extensionwork                = Input::file('work')->getClientOriginalExtension();
            $authorizationName            = $this->createFileName($extensionAuthorization);
            $workName                     = $this->createFileName($extensionwork);

            Input::file('authorization')->move($destinationPath, $authorizationName);
            Input::file('work')->move($destinationPath, $workName);

            $members   = $this->convertToString($request->member);
            $examiners = $this->convertToString($request->examiner);
            
            $this->work->title              = $request->title;
            $this->work->authors            = $members;
            $this->work->user_email         = $request->email;
            $this->work->advisor            = $request->advisor;
            $this->work->examiners          = $examiners;
            $this->work->description        = $request->description;
            $this->work->url                = $destinationPath.'/'.$workName;
            $this->work->authorization_file = $destinationPath.'/'.$authorizationName;
            $this->work->course_id          = $request->curso;
            $this->work->status             = 0;

            $this->work->save();

            //excluir token da tabela de tokens
            //página de sucesso

            return redirect('/');
            
        }
        
        return redirect()->back()->with('errors', 'Arquivo inválido');
    }

    public function createFileName($extension, $lenght = 10)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lenght).'.'.$extension;
    }

    public function convertToString(array $resource)
    {
        $string = '';
        
        foreach ($resource as $i => $value) {
            if (!empty($value) and $i == 0) {
                $string = $value;
            } else {
                if (!empty($value)) {
                    $string .= ', '.$value;
                }                
            }
        }

        return $string;
    }
}
