<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseNotification;
use App\FrontUser;
use App\UploadMark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class UploadMarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title          = 'Views Marks';
        $notifications  = CourseNotification::where( [['type', 3],] )->get();
        $courses        = Course::all();
        $front_users    = FrontUser::all();
        $upload_marks   = UploadMark::all();

        $data =[
            'title'         => $title,
            'courses'       => $courses,
            'notifications' => $notifications,
            'front_users'   => $front_users,
            'upload_marks'  => $upload_marks
        ];

        $data = (object)$data;

        return view('dashboard.view_marks', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title          = 'Upload Marks';
        $notifications  = CourseNotification::where( [['type', 3],] )->get();
        $courses        = Course::all();
        $front_users    = FrontUser::all();

        $data =[
            'title'         => $title,
            'courses'       => $courses,
            'notifications' => $notifications,
            'front_users'   => $front_users
        ];

        $data = (object)$data;

        return view('dashboard.add_marks', compact(['data']));
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
            'test_name'             => 'required',
            'student_id'            => 'required',
            'marks'                 => 'required',
            'status'                => 'required'
       ]);

        $upload_mark                 = new UploadMark();

        $upload_mark->course_name  = $request->course_name;
        $upload_mark->test_name    = $request->test_name;
        $upload_mark->student_id   = $request->student_id;
        $upload_mark->marks        = $request->marks;
        $upload_mark->status       = $request->status;

        $upload_mark->save();

        return redirect()->route('upload_marks.create')->with('success',
        'Upload Mark Data is Added');
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
        $title          = 'Edit Marks';
        $notifications  = CourseNotification::where( [['type', 3],] )->get();
        $courses        = Course::all();
        $front_users    = FrontUser::all();
        $upload_marks   = UploadMark::findOrFail($id);

        $data =[
            'title'         => $title,
            'courses'       => $courses,
            'notifications' => $notifications,
            'front_users'   => $front_users,
            'upload_marks'  => $upload_marks
        ];

        $data = (object)$data;

        return view('dashboard.edit_marks', compact(['data']));
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
            'test_name'             => 'required',
            'student_id'            => 'required',
            'marks'                 => 'required',
            'status'                => 'required'
       ]);

        $upload_mark                 = UploadMark::findOrFail($id);

        $upload_mark->course_name  = $request->course_name;
        $upload_mark->test_name    = $request->test_name;
        $upload_mark->student_id   = $request->student_id;
        $upload_mark->marks        = $request->marks;
        $upload_mark->status       = $request->status;

        $upload_mark->save();

        return redirect()->route('upload_marks.index')->with('success',
        'Update Mark Data is Added');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upload_mark  = UploadMark::findOrFail($id);
        $upload_mark->delete();

        return back();
    }
}
