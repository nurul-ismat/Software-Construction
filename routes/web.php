<?php

use Illuminate\Http\Request;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfNotAuthenticated;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// multilanguage route start

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

// multilanguage route end

// back auth routes start
Route::get('utm-login', 'BackLoginController@login_view')->name('login_view')->middleware(['guest']);
Route::post('utm-login', 'BackLoginController@login')->name('login');

Route::get('utm-register', 'BackRegisterController@register_view')->name('register_view')->middleware(['guest', 'can_register']);
Route::post('utm-register', 'BackRegisterController@register')->name('register');

Route::get('logout', 'BackLoginController@logout')->name('logout');
// back auth routes end

// status routes start
Route::get('utm-admin/userstatus/{id}', 'BackUserController@userstatus')->middleware(['auth', 'getpermissioninfo']);
Route::get('utm-admin/sliderstatus/{id}', 'BackSliderController@sliderstatus')->middleware(['auth', 'getpermissioninfo']);
Route::get('utm-admin/showreqstatus/{id}', 'ShowReqController@showreqstatus')->middleware(['auth', 'getpermissioninfo']);
// status routes end

// drag & drop position routes start
Route::post('/imagelist/update', 'GalleryImagesController@updateorder');
Route::post('/videolist/update', 'GalleryVideosController@updateorder');
Route::post('/sliderimageslist/update', 'BackSliderController@updateorder');
// drag & drop position routes end

// dependant dropdown routes start
Route::get('dropdown/category/', 'PropertiesController@subcat')->name('property_category');
// dependant dropdown routes end

// back dashboard route start ->middleware(RedirectIfAuthenticated::class)
Route::prefix('utm-admin')->middleware(['auth', 'getpermissioninfo'])->group(function () {
    Route::get('/', 'DashboardController@index');
    Route::get('properties_permission/{id}', 'PropertiesController@properties_permission')->name('toogle_properties_permission');

    Route::get('settings/email', 'EmailSettingsController@view')->name('email_view');
    Route::post('settings/email', 'EmailSettingsController@update')->name('email');

    Route::get('settings/users', 'UserSettingsController@view')->name('user_view');
    Route::post('settings/users', 'UserSettingsController@update')->name('user');

    route::get('settings/general', 'GeneralSettingsController@view')->name('general_view');
    route::post('settings/general', 'GeneralSettingsController@update')->name('general');

    Route::get('userlog', 'LogHistoryController@index')->name('userlog');

    Route::post('imagedropzone','GalleryImagesController@dzone')->name('imagedropzone');
    Route::post('videodropzone','GalleryVideosController@dzonev')->name('videodropzone');
    Route::get('settings/enquiry', 'EnquiryController@settings')->name('enquiry.settings');
    Route::put('settings/enquiry', 'EnquiryController@settingsup')->name('enquiry.settings');

    Route::resource('user', 'BackUserController');
    Route::resource('group', 'GroupController')->except(['show']);
    Route::resource('module', 'ModulesController')->except(['show']);
    Route::resource('page', 'PageController');
    Route::resource('course', 'AddCourseController');
    Route::resource('enrolled_courses', 'EnrolledCourseController');
    Route::resource('course_notification', 'CourseNotificationController');
    Route::resource('lecture_slide', 'CourseLectureController');
    Route::resource('course_activities', 'CourseActivitiesController');
    Route::resource('upload_marks', 'UploadMarksController');
    Route::resource('category', 'PagecategoryController');
    Route::resource('slider', 'BackSliderController');
    Route::resource('galleries', 'GalleryController')->except(['create', 'edit', 'update', ]);
    Route::resource('images', 'GalleryImagesController')->except(['create', 'index', 'show', 'edit']);
    Route::resource('vgalleries', 'VGalleryController')->except(['create', 'edit', 'update', ]);
    Route::resource('videos', 'GalleryVideosController')->except(['create', 'index', 'show', 'edit']);
    Route::resource('contactsetting', 'ContactSettingController')->except(['create', 'store', 'show', 'edit', 'destroy']);
    Route::resource('properties', 'PropertiesController')->except(['show']);
    Route::resource('propertiescategory', 'PropertiesCategoryController')->except(['create', 'show', 'edit']);
    Route::resource('agent','AgentController')->except(['show']);
    Route::resource('enquiry','EnquiryController')->except(['create', 'show', 'edit', 'update', 'destroy']);
    Route::resource('office', 'ContactOfficeController')->except(['create', 'show', 'edit']);
    Route::resource('showreq', 'ShowReqController')->except(['create', 'show', 'edit', 'update', 'destroy']);

});

// back dashboard route end

// Font end Route Start

//Route::group(['middleware' => ['sliders']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/activities', 'ActivitiesController@index')->name('activities');
    Route::get('/all-notification', 'FrontNotificationController@index')->name('all-notification');
    Route::get('/course-details/{id}', 'CourseDetailsController@index')->name('course-details');
    Route::get('/exam', 'FrontExamController@index')->name('exam');
    Route::get('/lecture-slide/{id}', 'LectureSlideController@index')->name('lecture-slide');
    Route::get('/performance-analysis', 'PerformanceAnalysisController@index')->name('performance-analysis');
    Route::get('/signup', 'FrontRegisterController@index')->name('signup');
    Route::get('/student-dashboard', 'StudentDashboardController@index')->name('student-dashboard');
    //Route::get('property-details/{id}', 'PropertyController@property_details')->name('property.details');
    //Route::get('/property/search', 'PropertyController@search')->name('property.search');
    Route::post('signup', 'FrontRegisterController@store')->name('front-register');
    Route::post('/', 'HomeController@FrontLogin')->name('front-login');
    Route::get('front-logout', 'HomeController@Frontlogout')->name('front-logout');
//});

// Font end Route End
