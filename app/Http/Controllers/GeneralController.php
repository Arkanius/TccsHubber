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
            'works'   => $request->id ? $work->getWorksByCourse($request->id, 1) : $work->getWorksAndCourse(1),
            'courses' => Course::where('status', 1)->get()
        ];

        return view('index', $data);
    }

    public function show(Request $request)
    {

        $data = [
            'works'   => Work::where('id', $request->id)->get(),
        ];

        return view('description', $data);
    }

    public function upload($token)
    {
    	$invite = new Invite;
    	$result = $invite->validateToken($token);

    	if ($result->isEmpty()) {
            abort(404);
        }
    }
}
