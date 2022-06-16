<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseActivities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CourseActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if(!check(24,2, session('permissions'))){

            return abort(404);
        }

        $title              = 'Course Documents';
        $courses            = Course::all();
        $coursedocuments    = CourseActivities::orderBy('id', 'DESC')->get();
        $count              = CourseActivities::count();

        $data =[
            'title'             => $title,
            'courses'           => $courses,
            'coursedocuments'   => $coursedocuments,
            'count'             => $count
        ];

        $data = (object)$data;

        return view('dashboard.add_new_activities', compact(['data']));

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
            'course_material_name'  => 'required',
            'course_material_code'  => 'required',
            'due_date'              => 'required',
            'course_material'       => 'required',
            'course_name'           => 'required',
            'status'                => 'required'
       ]);

        $course_activities          = new CourseActivities();

        $course_activities->course_material_name    = $request->course_material_name;
        $course_activities->course_material_code    = $request->course_material_code;
        $course_activities->due_date                = $request->due_date;
        $course_activities->course_name             = $request->course_name;
        $course_activities->status                  = $request->status;

        if($request->hasfile('course_material')){
            $path = $request->file('course_material')->store('/public/file/activities');
            $path = explode('/' , $path);
            $path = end($path);
            $course_activities->course_material = $path;
        }

        $course_activities->save();

        return redirect()->route('course_activities.create')->with('success',
        'Course Activities Data is Added');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course_activities = CourseActivities::findOrFail($id);
        $course_activities->delete();

        if(isset($course_activities->course_material) && !empty($course_activities->course_material)){
            $file = public_path('storage/file/activities/' . $course_activities->course_material);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        return back();
    }
}
