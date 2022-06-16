<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseLecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CourseLectureController extends Controller
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

        $title              = 'Add Lecture Slide';
        $courses            = Course::all();
        $courselectures     = CourseLecture::orderBy('id', 'DESC')->get();
        $count              = CourseLecture::count(); 

        $data =[
            'title'             => $title,
            'courses'           => $courses,
            'courselectures'    => $courselectures,
            'count'             => $count
        ];

        $data = (object)$data;

        return view('dashboard.add_lecture_slide', compact(['data']));
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
            'title'                 => 'required',
            //'slug'                => 'unique:pages',
            'course_name'           => 'required',
            'upload_file'           => 'required',
            'status'                => 'required'
       ]);

        $courselecture                      = new CourseLecture();

        $courselecture->title               = $request->title;
        $courselecture->course_name         = $request->course_name;
        $courselecture->status              = $request->status;

        if($request->hasfile('upload_file')){
            $path = $request->file('upload_file')->store('/public/file/lecture');
            $path = explode('/' , $path);
            $path = end($path);
            $courselecture->file = $path;
        }

        $courselecture->save();

        return redirect()->route('lecture_slide.create')->with('success',
        'Course Lecture Data is Added');
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
        $courselecture = CourseLecture::findOrFail($id);
        $courselecture->delete();

        if(isset($courselecture->file) && !empty($courselecture->file)){
            // delete slider image
            $file = public_path('storage/file/lecture/' . $courselecture->file);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        return back();
    }
}
