<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Validator;
use App\Invite;
use App\Work;
use Mail;

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
}
