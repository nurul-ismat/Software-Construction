<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseDetailsController extends Controller
{
   
   public function index($id)
    {
        
        if(Session::has('front_user')){

        $course  = Course::findorFail($id);

        $data = [
            'title'     => 'Course Details',
            'course'    => $course,
        ];

        $data = ( object ) $data;

        return view('frontend.course-details', compact('data'));
        }
        else{
            return redirect('/');
        }
    }

    public function show($id)
    {
        if(Session::has('front_user')){

            $course  = Course::findorFail($id);

            $data = [
                'title'     => 'Course Details',
                'course'    => $course,
            ];
    
            $data = ( object ) $data;
    
            return view('frontend.course-details', compact('data'));
        }
        else{
            return redirect('/');
        }
    }
}
