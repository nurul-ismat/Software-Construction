<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AgentController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {

        if ( !check( 18, 1, session( 'permissions' ) ) ) {

            return abort( 404 );
        }

        $agents = User::with( 'group' )->where( 'user_group', 4 )->paginate( 10 );

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'قائمة الوكيل';
            
        } else {

            $title = 'Agent List';
        }

        $count = User::where('user_group','=','4')->count();

        $data = [
            'title'     => $title,
            'agents'    => $agents,
            'count'     => $count,
        ];

        $data = ( object )$data;

        return view( 'dashboard.agent_list', compact( ['data'] ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {

        if ( !check( 18, 2, session( 'permissions' ) ) ) {

            return abort( 404 );
        }

         if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'إضافة وكيل';
            
        } else {

            $title = 'Add Agent';
        }

        $data = [
            'title' => $title,
            //'modules' => $modules
        ];

        $data = ( object )$data;

        return view( 'dashboard.add_agent', compact( ['data'] ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $request->validate( [
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'uname' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:password_confirmation',
            'password_confirmation' => 'required',
            'profile_picture' => 'image|max:2048'
        ] );

        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->uname = $request->uname;
        $user->email = $request->email;
        $user->is_front = 1;
        $user->password = md5( $request->password );
        $user->user_group = 4;
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
        $user->membership_type = $request->member_type;

        if ( $request->hasfile( 'profile_picture' ) ) {
            $path = $request->file( 'profile_picture' )->store( '/public/users/profile_img' );
            $path = explode( '/', $path );
            $path = end( $path );
            $user->profile_picture = $path;
        } else {
            $user->profile_picture = null;
        }

        $user->other_information = $request->other_information;
        $user->save();

        return redirect( '/kt-admin/agent' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        dd('show');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {

        $user = User::findOrFail( $id );
        $groups = Group::all();

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'تحرير وكيل';
            
        } else {

            $title = 'Edit Agent';
        }

        $data = [
            'title' => $title,
            'user' => $user,
            'groups' => $groups
        ];

        $data = ( object )$data;

        return view( 'dashboard.edit_agent', compact( 'data' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, $id ) {
        // dd('update');
        $request->validate( [
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'uname' => 'required|min:3|unique:users,uname,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'profile_picture' => 'image|max:2048'
        ] );

        $user = User::findorFail( $id );
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->uname = $request->uname;
        $user->email = $request->email;
        $user->is_front = 1;
        $user->password = md5( $request->password );
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
        $user->membership_type = $request->member_type;

        if ( $request->hasfile( 'profile_picture' ) ) {

            // delete old image if have any
            if ( isset( $user->profile_picture ) && !empty( $user->profile_picture ) ) {
                $image = public_path( 'storage/users/profile_img/' . $user->profile_picture );
                if ( File::exists( $image ) ) {
                    unlink( $image );
                }
            }

            // upload new image
            $path = $request->file( 'profile_picture' )->store( '/public/users/profile_img' );
            $path = explode( '/', $path );
            $path = end( $path );
            $user->profile_picture = $path;
        }

        $user->other_information = $request->other_information;
        $user->save();

        return redirect( 'kt-admin/agent/');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        // delete user
        $user = User::findOrFail( $id );
        $user->delete();

        if ( isset( $user->profile_picture ) && !empty( $user->profile_picture ) ) {
            // delete user image
            $image = public_path( 'storage/users/profile_img/' . $user->profile_picture );
            if ( File::exists( $image ) ) {
                unlink( $image );
            }
        }

        return back();
    }
}
