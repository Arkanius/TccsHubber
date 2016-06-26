<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Work extends Model
{
    protected $fillable = [
        'theme', 'authors', 'advisor', 'examiners', 'description', 'subject', 'url'
    ];

    public function getCourse()
    {
    	return $this->hasOne('App\Course');
    }

    public function user()
    {
    	return $this->hasOne('App\User', 'id', 'user_approved');
    }

    public function getWorksAndCourse($status, $skip = false)
    {
        if ($skip === false) {        
            return DB::table('works')
                        ->join('courses', 'works.course_id', '=', 'courses.id')
                        ->select('works.*')
                        ->where('works.status', $status)
                        ->take(5)
                        ->get();
        }

        return DB::table('works')
            ->join('courses', 'works.course_id', '=', 'courses.id')
            ->select('works.*')
            ->where('works.status', $status)
            ->take(5)
            ->skip($skip)
            ->get();
    }

    public function getWorksByCourse($courseId, $status, $skip = false)
    {
        if ($skip === false) {   
            return DB::table('works')
                        ->join('courses', 'works.course_id', '=', 'courses.id')
                        ->select('works.*')
                        ->where('courses.id', $courseId)
                        ->where('courses.status', 1)
                        ->where('works.status', $status)
                        ->take(5)
                        ->get();
        }

        return DB::table('works')
                        ->join('courses', 'works.course_id', '=', 'courses.id')
                        ->select('works.*')
                        ->where('courses.id', $courseId)
                        ->where('courses.status', 1)
                        ->where('works.status', $status)
                        ->take(5)
                        ->skip($skip)
                        ->get();
    }
}
