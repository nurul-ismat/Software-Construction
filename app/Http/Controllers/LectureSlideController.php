<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseLecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class LectureSlideController extends Controller
{

    public function index($id)
    {
        
        if(Session::has('front_user')){

        $course             = Course::findorFail($id);
        $courselectures     = CourseLecture::where( [['course_name', $id],] )->get();
    
        $data = [

            'title'             => 'Lecture Slide',
            'course'            => $course,
            'lecture_slides'    => $courselectures
        ];

        $data = (object) $data;

            return view('frontend.lecture-slide', compact('data'));
        }
        else{
            return redirect('/');
        }
    }

    public function store(Request $request)
    {


    }

    public function show($id)
    {

      
    }

    public function property_details($id)
    {

        
    }
}
