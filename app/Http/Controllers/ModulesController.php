<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(!check(3,1, session('permissions'))){
 
            return abort(404);
        }

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'قائمة الوحدة';

        } else {

            $title = 'Module List';
        }

        $modules = Module::paginate(10);

        $count  = Module::count();

        $data =[
            'title'     => $title,
            'modules'   => $modules,
            'count'     => $count   
        ];

        $data = (object)$data;

        return view('dashboard.module_list', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check(3,2, session('permissions'))){
 
            return abort(404);
        }

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'إضافة وحدة';

        } else {

            $title = 'Add Module';
        }

        $data =[
            'title' => $title,
        ];

        $data = (object)$data;

        return view('dashboard.add_new_modules', compact('data'));
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
            'module_name' => 'required|min:3'
        ]);

        $module = new Module();
        $module->module_name = $request->module_name;
        $module->save();

        return redirect('/utm-admin/module');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Module::findOrFail($id);

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'تحرير الوحدة';

        } else {

            $title = 'Edit Module';
        }

        $data =[
            'title' => $title,
            'module' => $module
        ];

        $data = (object)$data;

        return view('dashboard.edit_modules', compact('data'));
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
        $module = Module::findOrFail($id);
        $module->module_name = $request->module_name;
        $module->save();

        return redirect('/utm-admin/module');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();
        return redirect('/utm-admin/module');
    }
}
