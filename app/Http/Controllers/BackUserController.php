<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use Carbon\Carbon;
use App\LogHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class BackUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('group')->where( 'is_front', 0 )->paginate(10);


        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'قوائم المستخدم';

        } else {

            $title = 'User Lists';
        }

        $count      = User::count();

        $data =[
            
            'title' => $title,
            'users' => $users,
            'count' => $count
        ];

        $data = (object)$data;

        return view('dashboard.user_list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if(!check(1,2, session('permissions'))){
 
            return abort(404);
        }


        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'إضافة مستخدم جديد';

        } else {

            $title = 'Add new user';
        }

        $groups = Group::all();
        $data =[
            'title' => $title,
            'groups' => $groups
        ];

        $data = (object)$data;

        return view('dashboard.add_new_users', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => "required|min:3",
            'lname' => "required|min:3",
            'uname' => "required|min:3|unique:users",
            'email' => "required|email|unique:users",
            'password' => "required|min:6|same:password_confirmation",
            'password_confirmation' => "required",
            'profile_picture' => 'image|max:2048'
        ]);

        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->uname = $request->uname;
        $user->email = $request->email;
        $user->is_front = 0;
        $user->password = md5($request->password);
        $user->user_group = $request->user_group;
        $user->mobile = $request->mobile;
        $user->fax = $request->fax;
        $user->license = $request->license;
        $user->street1 = $request->street1;
        $user->street2 = $request->street2;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->province = $request->province;
        $user->postal_code = $request->postal_code;
        $user->country = $request->country;
        $user->website = $request->website;
        $user->msn = $request->msn;
        $user->skype = $request->skype;
        $user->twitter = $request->twitter;
        $user->bio = $request->bio;
        $user->other = $request->other;

        if ($request->hasfile('profile_picture')) {
            $path = $request->file('profile_picture')->store('/public/users/profile_img');
            $path = explode('/' , $path);
            $path = end($path);
            $user->profile_picture = $path;
        } else {
            $user->profile_picture = null;
        }

        $user->other_information = $request->other_information;
        $user->save();

        return redirect('/utm-admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if($id != Auth::user()->id){
            return abort(404);
        }

        $user = User::with('group')->findorFail($id);

        $log = LogHistory::where('user_id', $id)->orderBy('id','desc')->skip(1)->take(1)->get();

        if($log->count() > 0){

            $login = Carbon::createFromTimestamp($log[0]->login_time)->toDateTimeString(); 
            $logout = Carbon::createFromTimestamp($log[0]->logout_time)->toDateTimeString();

        }else{

            $login = ''; 
            $logout = '';
        }
        
        $data =[
            'title' => $user->uname . 'Profile',
            'user' => $user,
            'login_time' => $login,
            'logout_time' => $logout
        ];

        $data = (object)$data;

        return view('dashboard.user_profile', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $groups = Group::all();


        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'تحرير العضو';

        } else {

            $title = 'Edit User';
        }

        $data =[
            'title' => $title,
            'user' => $user,
            'groups' => $groups
        ];

        $data = (object)$data;

        return view('dashboard.edit_user', compact('data'));
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
        $request->validate([
            'fname' => "required|min:3",
            'lname' => "required|min:3",
            'uname' => 'required|min:3|unique:users,uname,'.$id,
            'email' => "required|email|unique:users,email,".$id,
            'profile_picture' => 'image|max:2048'
        ]);

        $user = User::findorFail($id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->uname = $request->uname;
        $user->email = $request->email;
        $user->is_front = 0;
        $user->password = md5($request->password);
        $user->user_group = $request->user_group;
        $user->mobile = $request->mobile;
        $user->fax = $request->fax;
        $user->license = $request->license;
        $user->street1 = $request->street1;
        $user->street2 = $request->street2;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->province = $request->province;
        $user->postal_code = $request->postal_code;
        $user->country = $request->country;
        $user->website = $request->website;
        $user->msn = $request->msn;
        $user->skype = $request->skype;
        $user->twitter = $request->twitter;
        $user->bio = $request->bio;
        $user->other = $request->other;

        if ($request->hasfile('profile_picture')) {

            // delete old image if have any
            if(isset($user->profile_picture) && !empty($user->profile_picture)){
                $image = public_path('storage/users/profile_img/' . $user->profile_picture);
                if(File::exists($image)){
                    unlink( $image );
                }
            }

            // upload new image
            $path = $request->file('profile_picture')->store('/public/users/profile_img');
            $path = explode('/' , $path);
            $path = end($path);
            $user->profile_picture = $path;
        }


        $user->other_information = $request->other_information;
        $user->save();

        return redirect('utm-admin/user/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete user
        $user = User::findOrFail($id);
        $user->delete();

        if(isset($user->profile_picture) && !empty($user->profile_picture)){
            // delete user image
            $image = public_path('storage/users/profile_img/' . $user->profile_picture);
            if(File::exists($image)){
                unlink( $image );
            }
        }

        return back();
    }

    public function userstatus($id){

        $user = User::findorFail($id);

        if($user->status != 1){
            $user->status = 1;
        }else{
            $user->status = 0;
        }
        $user->save();

        return back();
    }
}
