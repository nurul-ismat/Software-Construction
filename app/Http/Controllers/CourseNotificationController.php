<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CourseNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check(23,1, session('permissions'))){

            return abort(404);
        }

        $title = 'All Notification';
        
        $notifications  = CourseNotification::all();
        $count          = CourseNotification::count();
        $courses        = Course::all();

          $data =[
            'title'           => $title,
            'notifications'   => $notifications,
            'count'           => $count,
            'courses'         => $courses
        ];

        $data = (object)$data;

        return view('dashboard.all_notification_list', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check(23,2, session('permissions'))){

            return abort(404);
        }

        $title = 'New Notification';
        
        $courses  = Course::all();

          $data =[
            'title'     => $title,
            'courses'   => $courses,
        ];

        $data = (object)$data;

        return view('dashboard.add_new_notification', compact(['data']));
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
            'topic'                 => 'required',
            'type'                  => 'required',
            //'slug'                => 'unique:pages',
            'notification_content'  => 'required',
            'course_name'           => 'required',
            'status'                => 'required'
       ]);

        $notification    = new CourseNotification();

        $notification->topic                = $request->topic;
        $notification->type                 = $request->type;
        $notification->notification_message = $request->notification_content;
        $notification->date                 = $request->date;
        $notification->time                 = $request->time;
        $notification->course_name          = $request->course_name;
        $notification->status               = $request->status;

        $notification->save();

        return redirect()->route('course_notification.create')->with('success',
        'Course Notification Data is Added');
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
        $notification  = CourseNotification::findOrFail($id);
        $courses        = Course::all();
    
        $title = 'Notification Edit';
       
         $data =[
            'title'         => $title,
            'notification' => $notification,
            'courses'        => $courses
        ];

        $data = (object)$data;

        return view('dashboard.edit_notification', compact(['data']));
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
            'topic'                 => 'required',
            'type'                  => 'required',
            //'slug'                => 'unique:pages',
            'notification_content'  => 'required',
            'course_name'           => 'required',
            'status'                => 'required'
       ]);

        $notification    = CourseNotification::findOrFail($id);

        $notification->topic                = $request->topic;
        $notification->type                 = $request->type;
        $notification->notification_message = $request->notification_content;
        $notification->date                 = $request->date;
        $notification->time                 = $request->time;
        $notification->course_name          = $request->course_name;
        $notification->status               = $request->status;

        $notification->save();

        return redirect()->route('course_notification.index')->with('success',
        'Course Notification Data is Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification    = CourseNotification::findOrFail($id);
        $notification->delete();

        return back();
    }
}
