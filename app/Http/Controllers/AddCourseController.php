<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class AddCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check(22,1, session('permissions'))){

            return abort(404);
        }

        $title = 'Course Lists';
        
        $users = User::all();

        $count    = Course::count();

        $courses  = Course::all();

        $data =[
            'title'     => $title,
            'courses'   => $courses,
            'count'     => $count,
            'users'     => $users
        ];

        $data = (object)$data;

    return view('dashboard.all_courses_list', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        if(!check(22,2, session('permissions'))){

            return abort(404);
        }

        $title = 'New Course';
        
        $users = User::all();

          $data =[
            'title'     => $title,
            'users'     => $users,
        ];

        $data = (object)$data;

        return view('dashboard.add_new_course', compact(['data']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'course_name'           => 'required',
            //'slug'                => 'unique:pages',
            'responsible_professor' => 'required',
            'status'                => 'required'
       ]);

        $course    = new Course();

        $course->course_name              = $request->course_name;
        $course->responsible_professor    = $request->responsible_professor;
        $course->status                   = $request->status;

        $course->save();

        return redirect()->route('course.index')->with('success',
        'Course Data is Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course     = Course::findOrFail($id);
        $users      = User::all();

        $title = 'Course Edit';
       
         $data =[
            'title'      => $title,
            'course'     => $course,
            'users'      => $users
        ];

        $data = (object)$data;

        return view('dashboard.edit_course', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'course_name'           => 'required',
            //'slug'                => 'unique:pages',
            'responsible_professor' => 'required',
            'status'                => 'required'
       ]);

        $course                           = Course::findOrFail($id);
        $course->course_name              = $request->course_name;
        $course->responsible_professor    = $request->responsible_professor;
        $course->status                   = $request->status;

        $course->save();

        return redirect()->route('course.index')->with('success',
        'Course Data is Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return back();
    }
}
