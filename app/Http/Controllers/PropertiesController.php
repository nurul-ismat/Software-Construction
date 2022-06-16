<?php

namespace App\Http\Controllers;

use App\Properties;
use App\Propertiescategories;
use App\PropertyLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function subcat(Request $request)
    {
        if ($request->has('cat_id')) {
            $parentId = $request->cat_id;
            $data = Propertiescategories::where('category_id', $parentId)->get();
            return ['success' => true, 'data' => $data];
        }
    }

    public function index()
    {
        if (!check(16, 1, session('permissions'))) {
            return abort(404);
        }

        if (Auth::user()->group->id < 4) {
            $properties = Properties::with('user')->get();
        } else {
            $properties = Auth::user()->properties;
        }


        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'قوائم العقارات';
            
        } else {

            $title = 'Properties Lists';
        }

        $count 		= Properties::count();
        $publish 	= Properties::where('status','=','1')->count(); 
        $unpublish 	= Properties::where('status','=','0')->count(); 

        $data = [
            'title' 		=> $title,
            'properties' 	=> $properties,
            'count'			=> $count,
            'publish' 		=> $publish,
            'unpublish' 	=> $unpublish
        ];

        $data = (object) $data;

        return view('dashboard.properties_list', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        if (!check(16, 2, session('permissions'))) {
            return abort(404);
        }

        $categories = Propertiescategories::whereNull('category_id')->get();


        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'إضافة خصائص';
            
        } else {

            $title = 'Add Properties';
        }

        $data = [

            'title' => $title,
            'categories' => $categories,

        ];

        $data = (object) $data;

        return view('dashboard.add_properties', compact(['data']));
    }

    public function properties_permission($id)
    {
        $property_stat = Properties::findorFail($id);

        $property_stat->toogle_status();

        return back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'owner_name' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'neighborhood_name' => 'required',
            'street_name' => 'required',
            'building_no' => 'required',
            'age' => 'required',
            'direction' => 'required',
            'number_of_street' => 'required',
            'district' => 'required',
            'to_be_used' => 'required',
            'size' => 'required|numeric',
            'price' => 'required|numeric',
            'original_price' => 'required|numeric',
            'long' => 'required',
            'lat' => 'required',
            'image' => 'required|image',
            'brochure' => 'required|file|max:5000|mimes:pdf',
            'description' => 'required',
        ]);

        $properties = new Properties();

        $properties->title = $request->title;
        $properties->added_by = Auth::user()->id;
        $properties->owner_name = $request->owner_name;
        $properties->category = $request->category;
        $properties->sub_category = $request->sub_category;
        $properties->phone = $request->phone;
        $properties->city = $request->city;
        $properties->neighborhood_name = $request->neighborhood_name;
        $properties->street_name = $request->street_name;
        $properties->building_no = $request->building_no;
        $properties->age = $request->age;
        $properties->direction = $request->direction;
        $properties->number_of_street = $request->number_of_street;
        $properties->district = $request->district;
        $properties->to_be_used = $request->to_be_used;
        $properties->size = $request->size;
        $properties->price = $request->price;
        $properties->original_price = $request->original_price;
        $properties->image = $request->image;
        $properties->brochure = $request->brochure;
        $properties->description = $request->description;

        if ($request->hasfile('image')) {
            $path = $request->file('image')->store('/public/properties_image/');
            $path = explode('/', $path);
            $path = end($path);
            $properties->image = $path;
        }

        if ($request->hasfile('brochure')) {
            $path = $request->file('brochure')->store('/public/properties_brochure/');
            $path = explode('/', $path);
            $path = end($path);
            $properties->brochure = $path;
        }

        $properties->save();

        $iid = $properties->id;

        for ($i = 0; $i < count($request->long);
            $i++) {
            $property_location = new PropertyLocation();

            $property_location->property_id = $iid;
            $property_location->long = $request->long[$i];
            $property_location->lat = $request->lat[$i];

            $property_location->save();
        }

        return redirect()->route('properties.index')->with(
            'success',
            'Properties Data is Added Successfully'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $properties = Properties::findOrFail($id);

        $categories = Propertiescategories::whereNull('category_id')
            ->with('childrenCategories')
            ->get();


        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'تحرير الخصائص';
            
        } else {

            $title = 'Properties Edit';
        }

        $data = [

            'title' => $title,
            'properties' => $properties,
            'categories' => $categories,

        ];

        $data = (object) $data;

        return view('dashboard.edit_properties', compact(['data']));
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
        $this->validate($request, [

            'title' => 'required',
            'owner_name' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'neighborhood_name' => 'required',
            'street_name' => 'required',
            'building_no' => 'required',
            'age' => 'required',
            'direction' => 'required',
            'number_of_street' => 'required',
            'to_be_used' => 'required',
            'price' => 'required',
            'original_price' => 'required',
            'long' => 'required',
            'lat' => 'required',
            'image' => 'image',
            'brochure' => 'file|max:5000|mimes:pdf',
            'description' => 'required',
        ]);

        $properties = Properties::findOrFail($id);
        $properties->title = $request->title;
        $properties->owner_name = $request->owner_name;
        $properties->category = $request->category;
        $properties->sub_category = $request->sub_category;
        $properties->phone = $request->phone;
        $properties->city = $request->city;
        $properties->neighborhood_name = $request->neighborhood_name;
        $properties->street_name = $request->street_name;
        $properties->building_no = $request->building_no;
        $properties->age = $request->age;
        $properties->direction = $request->direction;
        $properties->number_of_street = $request->number_of_street;
        $properties->to_be_used = $request->to_be_used;
        $properties->price = $request->price;
        $properties->original_price = $request->original_price;
        $properties->long = $request->long;
        $properties->lat = $request->lat;

        $properties->description = $request->description;

        if ($request->hasfile('image')) {
            if (isset($properties->image) && !empty($properties->image)) {
                $image = public_path('storage/properties_image/' . $properties->image);
                if (File::exists($image)) {
                    Storage::delete('/public/properties_image/' . $properties->image);
                }
            }

            $path = $request->file('image')->store('/public/properties_image/');
            $path = explode('/', $path);
            $path = end($path);
            $properties->image = $path;
            $properties->image = $path;
        }

        if ($request->hasfile('brochure')) {
            if (isset($properties->brochure) && !empty($properties->brochure)) {
                $image = public_path('storage/properties_brochure/' . $properties->brochure);
                if (File::exists($image)) {
                    unlink($image);
                }
            }

            $path = $request->file('brochure')->store('/public/properties_brochure/');
            $path = explode('/', $path);
            $path = end($path);
            $properties->brochure = $path;
            $properties->brochure = $path;
        }

        $properties->save();

        return redirect()->route('properties.index')->with(
            'success',
            'Properties Data is Added Successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $properties = Properties::findOrFail($id);
        $properties->delete();

        if (isset($properties->image) && !empty($properties->image)) {
            // delete user image
            $image = public_path('storage/properties_image/' . $properties->image);
            //dd( $image );
            if (File::exists($image)) {
                unlink($image);
            }
        }
        if (isset($properties->brochure) && !empty($properties->brochure)) {
            // delete user image
            $image = public_path('storage/properties_brochure/' . $properties->brochure);
            //dd( $image );
            if (File::exists($image)) {
                unlink($image);
            }
        }

        return back();
    }
}
