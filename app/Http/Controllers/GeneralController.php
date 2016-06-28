<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Work;
use App\Course;
use App\Invite;


class GeneralController extends Controller
{
    
    public function home(Request $request)
    {   
        $work = new Work;

        $data = [
            'works'   		=> $request->id ? $work->getWorksByCourse($request->id, 1) : $work->getWorksAndCourse(1),
            'courses' 		=> Course::where('status', 1)->get(),
            'currentCourse' => $request->id ? Course::where('id', $request->id)->get() : ''
        ];

        return view('index', $data);
    }

    public function show(Request $request)
    {

        $data = [
            'works' => Work::where('id', $request->id)->where('status', 1)->get(),
        ];

        if ($data['works']->isEmpty()) {
        	abort(404);
        }

        return view('description', $data);
    }

    public function upload($token)
    {
    	$invite = new Invite;
    	$result = $invite->validateToken($token);

    	if ($result->isEmpty()) {
            abort(404);
        }


        $data = [
            'courses' => Course::where('status', 1)->orderBy('name', 'asc')->get()
        ];

        return view('upload', $data);
    }

    public function search(Request $request)
    {
        if (!empty($request->item)) {
        	$data = [
        		'works'   => Work::where('title', 'like', '%'.$request->item.'%')->where('status', 1)->get(),
                'courses' => Course::where('status', 1)->orderBy('name', 'asc')->get()
        	];

            return view('resultado', $data);
        }

        return view('index');
    }
}
