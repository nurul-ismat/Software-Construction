<?php

namespace App\Http\Controllers;

use App\Group;
use App\Module;
use App\GroupPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {

        if(!check(2,1, session('permissions'))){
 
            return abort(404);
        }

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'قائمة المجموعة';

        } else {

            $title = 'Group List';
        }

        $groups = Group::with( 'user' )->paginate(10);

        $count = Group::count();

        $data = [
            'title'     => $title,
            'groups'    => $groups,
            'count'     => $count   
        ];

        $data = ( object )$data;

        return view( 'dashboard.group_list', compact( 'data' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {

        if(!check(2,2, session('permissions'))){
 
            return abort(404);
        }

        $modules = Module::all();

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'إضافة مجموعة';

        } else {

            $title = 'Add Group';
        }

        $data = [
            'title' => $title,
            'modules' => $modules
        ];

        $data = ( object )$data;

        return view( 'dashboard.add_new_group', compact( 'data' ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {

        $request->validate( [
            'group_name' => 'required|min:3|unique:groups'
        ] );

        $gn = new Group();
        $gn->group_name = $request->group_name;
        $gn->save();
        $gid = $gn->id;

        if ( $request->permissions != null ) {
            foreach ( $request->permissions as $gpermissions ) {
                $gps = explode( '-', $gpermissions );
                $gp = new GroupPermission();
                $gp->group_id = $gid;
                $gp->module_id = $gps[0];
                $gp->permission_id = $gps[1];
                $gp->save();
                unset( $gps );
            }
        }

        return redirect( '/kt-admin' );

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $groups = Group::with( 'permission' )->findorFail( $id );
        // dd( $groups );
        $modules = Module::all();

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'تحرير المجموعة';

        } else {

            $title = 'Edit Group';
        }


        $data = [
            'title' => $title,
            'groups' => $groups,
            'modules' => $modules
        ];

        $data = ( object )$data;

        return view( 'dashboard.edit_group', compact( 'data' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {

        $gn = Group::find( $id );

        $request->validate( [
            'group_name' => 'required|min:3|unique:groups,group_name,' .$id,
        ] );

        $gn->group_name = $request->group_name;
        $gn->save();

        GroupPermission::where( 'group_id', $id )->delete();

        if ( $request->permissions != null ) {
            foreach ( $request->permissions as $gpermissions ) {
                $gps = explode( '-', $gpermissions );
                $gp = new GroupPermission();
                $gp->group_id = $id;
                $gp->module_id = $gps[0];
                $gp->permission_id = $gps[1];
                $gp->save();
                unset( $gps );
            }
        }

        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        $group = Group::findOrFail( $id );
        $group->delete();
        return redirect( '/kt-admin/group' );
    }
}
