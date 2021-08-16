<?php

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

/**
 * Route List
 */

Route::prefix('admin')->middleware(['RoleBuzz', 'auth'])->group(function () {

    Route::get('permissions', 'Admin\Role\PermissionsController@index')->name('permissions');
    Route::get('permissions/create-group', 'Admin\Role\PermissionsController@create')->name('create_group');
    Route::post('permissions/store', 'Admin\Role\PermissionsController@store')->name('group_store');
    Route::get('permissions/build/{id}', 'Admin\Role\PermissionsController@buildPermission')->name('build_permission');
    Route::post('permissions/set/{id}', 'Admin\Role\PermissionsController@setPermission');
    Route::resource('permissions/menu', 'Admin\Role\MenuController');
    Route::get('/', 'Admin\DashboardController@index')->name('admin_dashboard');

    Route::resource('/userinfo', 'Admin\UserinfoController');

    /**
     * DoctorInfo creation
     */
    Route::get('/doctor_info','Admin\DoctorInfoController@index')->name('doctor_info');
    Route::get('/doctor_info/create','Admin\DoctorInfoController@create')->name('doctor_info_create');
    Route::post('/doctor_info/store','Admin\DoctorInfoController@store')->name('doctor_info_store');
    Route::get('/doctor_info/{id}/edit','Admin\DoctorInfoController@edit')->name('doctor_info_edit');
    Route::put('/doctor_info/{id}/update','Admin\DoctorInfoController@update')->name('doctor_info_update');
    Route::get('/doctor_info/{id}/destroy','Admin\DoctorInfoController@destroy')->name('doctor_info_destroy');
    Route::get('/doctor_info/{id}/show','Admin\DoctorInfoController@show')->name('doctor_info_show');
    Route::get('/doctor_info_datatable','Admin\DoctorInfoController@serverSideTable')->name('doctor_info_datatable');


    /**
     * Area creation
     */

    Route::resource('/area', 'Admin\AreaController');
    Route::get('/area','Admin\AreaController@index')->name('area');
    Route::get('/area/create','Admin\AreaController@create')->name('area_create');
    Route::post('/area/store','Admin\AreaController@store')->name('area_store');
    Route::get('/area/{id}/edit','Admin\AreaController@edit')->name('area_edit');
    Route::put('/area/{id}/update','Admin\AreaController@update')->name('area_update');
    Route::get('/area/{id}/destroy','Admin\AreaController@destroy')->name('area_destroy');

    /**
     * Hospital creation
     */

    Route::resource('/hospital', 'Admin\HospitalController');
    Route::get('/hospital','Admin\HospitalController@index')->name('hospital');
    Route::get('/hospital/create','Admin\HospitalController@create')->name('hospital_create');
    Route::post('/hospital/store','Admin\HospitalController@store')->name('hospital_store');
    Route::get('/hospital/{id}/edit','Admin\HospitalController@edit')->name('hospital_edit');
    Route::put('/hospital/{id}/update','Admin\HospitalController@update')->name('hospital_update');
    Route::get('/hospital/{id}/destroy','Admin\HospitalController@destroy')->name('hospital_destroy');

    /**
     * Specialities creation
     */

    Route::resource('/speciality', 'Admin\SpecialitiesController');
    Route::get('/speciality','Admin\SpecialitiesController@index')->name('speciality');
    Route::get('/speciality/create','Admin\SpecialitiesController@create')->name('speciality_create');
    Route::post('/speciality/store','Admin\SpecialitiesController@store')->name('speciality_store');
    Route::get('/speciality/{id}/edit','Admin\SpecialitiesController@edit')->name('speciality_edit');
    Route::put('/speciality/{id}/update','Admin\SpecialitiesController@update')->name('speciality_update');
    Route::get('/speciality/{id}/destroy','Admin\SpecialitiesController@destroy')->name('speciality_destroy');

});


Route::get('user_info/{id}/show','Admin\UserinfoController@show')->name('usr_profile')->middleware(['auth']);
Route::get('update','Admin\UpdatePassController@changePass')->name('upd_pass')->middleware(['auth']);
Route::post('reset','Admin\UpdatePassController@passwordChange')->name('reset_pass')->middleware(['auth']);



Route::get('checkpage',function (){
    return view('admin.userinfo.newpasschange');
});


Route::get('/', 'Auth\LoginController@login')->name('login');
Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

