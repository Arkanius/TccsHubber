<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Work;
use App\Course;


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
}
